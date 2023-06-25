<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GroupResource;
use App\Models\Bank;
use App\Models\Beneficiary;
use App\Models\ControlChangeData;
use App\Models\Disciplines;
use App\Models\DisciplineUser;
use App\Models\EntityName;
use App\Models\Ethnicity;
use App\Models\Evaluation;
use App\Models\Event_support;
use App\Models\Group;
use App\Models\Municipality;
use App\Models\Pedagogical;
use App\Models\Role;
use App\Models\Sidewalk;
use App\Models\Status;
use App\Models\User;
use App\Models\Validity_period;
use App\Models\Zone;
use App\Models\ZoneUser;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Http\Request;
use App\Traits\UserDataTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class GeneralController extends Controller
{
    use UserDataTrait, FunctionGeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataSelects()
    {
        $monitors = [];
        $managers = [];
        $group_beneficiaries = [];

        /* SIDEWALKS O CORREGIMIENTOS */
        $sidewalks = Sidewalk::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        /* PERIDOS DE VIGENCIA */
        $validity_periods = Validity_period::select('term as label', 'id as value')->get();

        /* ROLES */
        $roles = Role::select('name as label', 'slug as value')->orderBy('name', 'ASC')->get();

        //MUNICIPALITYS
        $municipalities = Municipality::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //MUNICIPALITYS BY USER
        $user = Auth::user(); // Obtener el usuario autenticado
        $zoneIds = $user->zone->pluck('zones_id')->toArray(); // Obtener los zone_id del usuario autenticado
        $my_municipalities = Municipality::select('name as label', 'id as value')->whereIn('zone_id', $zoneIds)->get();

        //ZONES
        $zones = Zone::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //STATUS
        $status = Status::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //PERIOD
        $period = Validity_period::select('term as label', 'id as value')->get();

        //Dicpline
        $disciplinas = DisciplineUser::where('user_id', $user->id)->with('discipline')->get();
        $diciplines = $disciplinas->map(function ($disciplina) {
            return [
                'label' => $disciplina->discipline->name,
                'value' => $disciplina->discipline->id,
            ];
        });
        // $diciplines = Disciplines::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //Bancks
        // $bancks = Bank::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //Ethniea
        $ethniacity = Ethnicity::select('name as label', 'id as value')->orderBy('name', 'ASC')->get();

        //Grupe
        $groups = Group::select('id as value', 'name as label')->orderBy('name', 'ASC')->get();

        //EventSupport
        // $eventSuport = Event_support::select('id as value', 'name as label')->orderBy('name', 'ASC')->get();

        //Evaluations
        $evaluations = Evaluation::select('id as value', 'name as label')->orderBy('name', 'ASC')->get();

        $users_table = User::query()->with(['profile' => function ($query) {
            $query->select('user_id', 'document_number', 'contractor_full_name');
        }])->select('id', 'name')->get();

        $data = [
            "evaluations" => $evaluations,
            // "eventSuport" => $eventSuport,
            "ethniacity" => $ethniacity,
            // "bancks" => $bancks,
            "diciplines" => $diciplines,
            "period" => $period,
            "status" => $status,
            "municipalities" => $municipalities,
            "my_municipalities" => $my_municipalities,
            "zones" => $zones,
            "roles" => $roles,
            "users_table" => $users_table,
            "groups" => $groups,
            "validity_periods" => $validity_periods,
            "sidewalks" => $sidewalks,
        ];

        return response()->json(
            $data
        );
    }

    public function getDynamicSelects(Request $request)
    {
        $selects = $request->selects;
        $data = [];

        $identification_types = [
            ['label' => 'Tarjeta de Identidad', 'value' => 'TI'],
            ['label' => 'Cédula de Ciudadanía', 'value' => 'CC'],
        ];

        foreach ($selects as $key => $value) {
            try {
                if ($value == 'identification_types') {
                    $record = $identification_types;
                }elseif('asistentList' == $value){
                        $record = User::select(DB::raw("CONCAT(name, ' ', lastname) as label"), 'id as value')->whereHas('roles', function ($query) {
                        $query->where('role_id', 8);
                    })->get();
                }elseif('metodologoList' == $value){
                    $record = User::select(DB::raw("CONCAT(name, ' ', lastname) as label"), 'id as value')->whereHas('roles', function ($query) {
                        $query->where('role_id', 10);
                    })->get();
                }elseif('managerList' == $value){
                    $record = User::select(DB::raw("CONCAT(name, ' ', lastname) as label"), 'id as value')->whereHas('roles', function ($query) {
                        $query->whereNotIn('role_id', [12, 11]);
                    })->get();
                }elseif('monitors' == $value){
                    $record = User::select(DB::raw("CONCAT(name, ' ', lastname) as label"), 'id as value')->whereHas('roles', function ($query) {
                        $query->whereNotIn('role_id', [12]);
                    })->get();
                }
                else {
                    $record = DB::table($value)->select('name as label', 'id as value');
                    if($request->auth == "true"){
                        if (Schema::hasColumn($value, 'zone_id')) {
                            $user = Auth::user()->id;
                            $zones = ZoneUser::where('user_id', $user)->pluck('zones_id');
                            $record = $record->whereIn('zone_id', $zones);
                        }
                    }
                    if($value == "municipalities" && Auth::user()->roles[0]->id == config("roles.psicologo")){
                        $user = Auth::user()->id;
                        $zones = ZoneUser::where('user_id', $user)->pluck('zones_id');
                        $record = $record->whereIn('zone_id', $zones);
                    }
                    $record = $record->get();
                }
            } catch (\Throwable $th) {
                $record = DB::table($value)->select('term as label', 'id as value')->get();
            }

            if ($record){
                array_push($data, $record);
            }
            else {
                $data = config("selectsDefault.$value");
            }
        }

        return response()->json(
            $data
        );
    }

    /* TRAE TODOS LOS ESTADOS */
    public function getSelectStatus() {
        $status = Status::select('name as label', 'id as value')->orderBy('id', 'ASC')->get();
        return response()->json(
            $status
        );
    }

    public function getCitiesByDepartment(Request $request)
    {
        $department_id = $request->department;

        $data = DB::table('cities')->where('department_id', $department_id)->select('name as label', 'id as value')->get();

        return response()->json(
            $data
        );
    }

    public function getData(Request $request)
    {
        // $user_id = $this->getIdUserAuth();
        $user_id = 1;
        $group = Group::find(4);
        return  $group->beneficiaries;
        $date = Carbon::now();

        // Crear
        $entidad = EntityName::create([
            'name' => $request->name,
            'user_id' => $user_id
        ]);
        $entidad->control_data()->create([
            'user_id' => $user_id,
            'action' => 'store',
            'data_original' => $entidad->getOriginal(),
            'data_change' => $entidad->getChanges(),
            'created_at' => $date,
        ]);

        return response()->json(
            $entidad

        );
    }

    public function getConsecutive(Request $request)
    {
        $response = DB::select("SELECT COUNT(id) as consecutive FROM $request->table");
        $count = count($response);
        return response()->json($count == 0 ? $request->abreviature . '1' : $request->abreviature . $response[0]->consecutive + 1, 200);
    }

    public function getOneWithPick(Request $request)
    {
        $fields = $request->fields;
        $table = $request->table;
        $id = $request->id;

        try {
            $response = DB::table($table)->where('id', $id)->select($fields)->first();
            return  $this->createResponse($response, 'Data');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al consultar los datos' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function getDocument(Request $request)
    {
        $path = $request->query('file');

        if (Storage::disk('public')->exists($path)){
            return Storage::disk('public')->get($path);
        }
        else {
            return response()->json(['El archivo que intentas obtener no existe.'], 404);
        }
    }

    public function getChangeDataModels()
    {
        try {
            $response = ControlChangeData::with('user')->get();
            return  $this->createResponse($response, 'Data');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar la data' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function destroyChangeDataModel(Request $request)
    {
        try {
            $results =  ControlChangeData::find($request->id)->delete();
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el data' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

}
