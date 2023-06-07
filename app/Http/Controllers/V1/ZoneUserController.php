<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Models\DisciplineUser;
use App\Models\Municipality;
use App\Models\MunicipalityUser;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\ZoneUser;
use App\Repositories\UsersZonesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ZoneUserController extends Controller
{
    private $usersZonesRepository;

    function __construct(UsersZonesRepository $usersZonesRepository)
    {
        $this->usersZonesRepository = $usersZonesRepository;
    }

    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->usersZonesRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las zonas de los usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $results = $this->usersZonesRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las zonas las zonas de los usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function show($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->usersZonesRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la  zona del usuario', 404);
            }
            return $this->createResponse($result, 'La zona del usuario fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la lista de zonas de usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $results = $this->usersZonesRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la zona del usuario' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function destroy($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->usersZonesRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la zona del usuario' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function getUserRegionsMunicipalities($id) {
        $userId = $id; // Recibo el id del usuario que está logueado METODOLOGO
        $zoneUser = ZoneUser::where('user_id', $userId)->first(); // Obtener el primer resultado
        $municipalitiesUserRegion = Municipality::where('zone_id', $zoneUser->id)->get(); // Acceder al atributo id
    
        return response()->json([$municipalitiesUserRegion]);
    }

    public function getMunicipalitiesUserDisciplines($id) {
        $municipalitieId = $id; // recibo el id del municipio
    
        // en la tabla municipios con el id del municipio obtengo la zona
        $municipality = Municipality::find($municipalitieId);
        $zoneId = $municipality->zone_id; 
    
        // con el id de la zona obtengo los usuarios de esa zona
        $users = ZoneUser::where('zone_id', $zoneId)->get();
    
        // con esos usuarios obtengo las disciplinas
        $userIds = $users->pluck('id');
        $disciplinesUsers = DisciplineUser::whereIn('user_id', $userIds)->get(); 
        
        return response()->json([
            'users' => $users,
            'disciplinesUsers' => $disciplinesUsers
        ]);
    }

    public function getUserRoleRegions(){

        $userId = Auth::user()->id; // Obtener el ID del usuario que está logueado
        $user = RoleUser::where('user_id', $userId)->first(); // Obtener el rol del usuario logueado
        $region = ZoneUser::where('user_id', $userId)->first(); // Obtener la región del usuario logueado
        $regions = ZoneUser::where('user_id', $userId)->pluck('zone_id');

        if ($user['role_id'] == 10) { // Verificar si el rol es "metodolog"
            $usersRegions = ZoneUser::where('zone_id', $region->zone_id)->pluck('user_id'); // Obtener los IDs de usuarios con la misma región
            $users = RoleUser::whereIn('user_id', $usersRegions)->where('role_id', $user->role_id)->get(); // Obtener los usuarios con el mismo rol y región

            return response()->json($users);
        }

        if($user['role_id'] == 9){ // coordinador regional
            $users = RoleUser::whereIn('role_id', $user->role_id)
            ->whereIn('user_id', function ($query) use ($regions) {
                $query->select('user_id')
                    ->from('zone_users')
                    ->whereIn('zone_id', $regions);
            })
            ->get();

            return response()->json($users);
        }
        if($user['role_id'] == 6){ // coordinador psicosocial
            $usersRegions = ZoneUser::where('zone_id', $region->zone_id)->pluck('user_id'); // Obtener los IDs de usuarios con la misma región
            $users = RoleUser::whereIn('user_id', $usersRegions)->where('role_id', $user->role_id)->get(); // Obtener los usuarios con el mismo rol y región

            return response()->json($users);
        }
        if($user['role_id'] == 4){ // subdirector tecnico regional
            $usersRegions = ZoneUser::where('zone_id', $region->zone_id)->pluck('user_id'); // Obtener los IDs de usuarios con la misma región
            $users = RoleUser::whereIn('user_id', $usersRegions)->where('role_id', $user->role_id)->get(); // Obtener los usuarios con el mismo rol y región

            return response()->json($users);
        }
    }
}
