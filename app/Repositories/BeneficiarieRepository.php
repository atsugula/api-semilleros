<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryCollection;
use App\Http\Resources\V1\BeneficiaryResource;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\Beneficiary;
use App\Models\BeneficiaryScreening;
use App\Models\BeneficiaryGuardians;
use App\Models\KnowGuardians;
use App\Models\Municipality;
use App\Models\MunicipalityUser;
use App\Models\User;
use App\Models\ZoneUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BeneficiarieRepository
{

    use FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new Beneficiary();
    }

    public function getAll()
    {
        $user_id = $this->getIdUserAuth();
        $rol_id = $this->getIdRolUserAuth();


        if($rol_id == config('asistente_administrativo') || config('super-root') || config('director_administrator')){
            $beneficiaries = new BeneficiaryCollection($this->model->whereNotIn('created_by', 1)->orderBy('id', 'ASC')->get());
        }
        else{
            $beneficiaries = new BeneficiaryCollection($this->model->where('created_by', $user_id)->orderBy('id', 'ASC')->get());
        }
        return $beneficiaries;
    }

    public function create($request)
    {
        DB::beginTransaction();

        $request['created_by'] = Auth::id();
        $beneficiarie = Beneficiary::create($request);
        $beneficiarie->save();

        // Ficha de Tamizaje
        $fichaTamizaje = new BeneficiaryScreening();
        $fichaTamizaje->estatura        = $request['estatura'];
        $fichaTamizaje->envergadura     = $request['envergadura'];
        $fichaTamizaje->masa            = $request['masa'];
        $fichaTamizaje->flexibilidad    = $request['flexibilidad'];
        $fichaTamizaje->velocidad       = $request['velocidad'];
        $fichaTamizaje->fuerza          = $request['fuerza'];
        $fichaTamizaje->oculomanual     = $request['oculomanual'];
        $fichaTamizaje->beneficiary_id  = $beneficiarie->id;
        $fichaTamizaje->save();

        // Acudientes
        $acudiente = BeneficiaryGuardians::updateOrCreate(
            [
                'cedula' => $request['attendant_number_document']
            ],
            [
                'firts_name'    => $request['attendant_name'],
                'last_name'     => $request['attendant_last_name'],
                'email'         => $request['email'],
                'phone_number'  => $request['phone_number'],
            ]
        );

        $knowGuardian = KnowGuardians::updateOrCreate(
            [
                'id_beneficiary' => $beneficiarie->id,
                'id_guardian'   => $acudiente->id
            ],
            [
                'relationship' => $request['parentesco'],
                'find_out'     => json_encode($request['find_out']),
                'social_media' => json_encode($request['social_media']),
            ]
        );

        /* GUARDAMOS EN CONTROL DATA */
        $this->control_data($beneficiarie, 'store');
        $result = new BeneficiaryResource($beneficiarie);

        DB::commit();

        return $result;
    }

    public function findById($id)
    {
        $beneficiarie = $this->model->findOrFail($id);
        $result = new BeneficiaryResource($beneficiarie);
        return $result;
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        $request['created_by'] = Auth::id();
        $beneficiarie = $this->model->findOrFail($id);
        $beneficiarie->update($request);

        // Ficha de Tamizaje
        $fichaTamizaje = BeneficiaryScreening::where('beneficiary_id', $beneficiarie->id)->firstOrFail();
        $fichaTamizaje->estatura        = $request['estatura'];
        $fichaTamizaje->envergadura     = $request['envergadura'];
        $fichaTamizaje->masa            = $request['masa'];
        $fichaTamizaje->flexibilidad    = $request['flexibilidad'];
        $fichaTamizaje->velocidad       = $request['velocidad'];
        $fichaTamizaje->fuerza          = $request['fuerza'];
        $fichaTamizaje->oculomanual     = $request['oculomanual'];
        $fichaTamizaje->save();

        // Acudientes
        $acudiente = BeneficiaryGuardians::updateOrCreate(
            [
                'cedula' => $request['attendant_number_document']
            ],
            [
                'firts_name'    => $request['attendant_name'],
                'last_name'     => $request['attendant_last_name'],
                'email'         => $request['email'],
                'phone_number'  => $request['phone_number'],
            ]
        );

        $knowGuardian = KnowGuardians::updateOrCreate(
            [
                'id_beneficiary' => $beneficiarie->id,
                'id_guardian'   => $acudiente->id
            ],
            [
                'relationship' => $request['parentesco'],
                'find_out'     => json_encode($request['find_out']),
                'social_media' => json_encode($request['social_media']),
            ]
        );

        /* GUARDAMOS EN CONTROL DATA */
        $this->control_data($beneficiarie, 'update');
        $result = new BeneficiaryResource($beneficiarie);

        DB::commit();

        return $result;
    }

    public function delete($id)
    {
        $beneficiarie = $this->model->findOrFail($id);
        $beneficiarie->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function getValidate($data, $method)
    {

        $validate = [
            'affiliation_type' => 'bail|required',
            'document_number' => [
                'required',
                Rule::unique(Beneficiary::class),
            ],
            /* 'group_id' => 'bail|required',
            'full_name' => 'bail|required',
            'institution_entity_referred' => 'bail|required',
            'accept' => 'bail|required',
            'linkage_project' => 'bail|required',
            'participant_type' => 'bail|required',
            'type_document' => 'bail|required',
            'document_number' => 'bail|required',
            'zone' => 'bail|required',
            'stratum' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'file' => 'bail|required',
            'status' => 'bail|required',
            'audited' => 'bail|required',
            'rejection_message' => 'bail|required',
            'referrer_name' => 'bail|required', */
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'affiliation_type' => 'Tipo de afiliaciín',
            /* 'group_id' => 'bail|required',
            'full_name' => 'bail|required',
            'institution_entity_referred' => 'bail|required',
            'accept' => 'bail|required',
            'linkage_project' => 'bail|required',
            'participant_type' => 'bail|required',
            'type_document' => 'bail|required',
            'document_number' => 'bail|required',
            'zone' => 'bail|required',
            'stratum' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'file' => 'bail|required',
            'status' => 'bail|required',
            'audited' => 'bail|required',
            'rejection_message' => 'bail|required',
            'referrer_name' => 'bail|required', */
        ];

        return $this->validator($data, $validate, $messages, $attrs);
    }

    public function getAllByUserRegion()
    {

        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $zoneUsers = new ZoneUser();
        $municipalityUsers = new MunicipalityUser();

        $municipalitiesByZone = $zoneUsers
            ->join('municipalities', 'zone_users.id', '=', 'municipalities.zone_id')
            ->where('zone_users.user_id', $user_id)
            ->select('municipalities.id')
            ->get()->toArray();

        $municipalities = $municipalityUsers
            ->join('municipalities', 'municipality_users.municipalities_id', '=', 'municipalities.id')
            ->where('municipality_users.user_id', $user_id)
            ->select('municipalities.id')
            ->get()->toArray();

        $mergedMunicipalities = array_merge($municipalitiesByZone, $municipalities);
        $allMunicipalities = array();

        foreach ($mergedMunicipalities as $key => $a) {
            array_push($allMunicipalities, $a['id']);
        }

        if ($rol_id == config('roles.asistente_administrativo')) {

            return new BeneficiaryCollection(
                $this->model
                    ->whereIn('municipalities_id', $allMunicipalities)
                    ->whereIn('status_id', [config('status.APR'), config('status.REC')])
                    ->orderBy('id', 'ASC')
                    ->get()
            );
        } else if ($rol_id == config('roles.coordinador_regional') || $rol_id == config('roles.coordinador_maritimo')) {

            return new BeneficiaryCollection(
                $this->model
                    ->whereIn('municipalities_id', $allMunicipalities)
                    ->whereIn('status_id', [config('status.ENP'), config('status.APR'), config('status.REC')])
                    ->orderBy('id', 'ASC')
                    ->get()
            );
        } else if ($rol_id == config('roles.metodologo')) {

            return new BeneficiaryCollection(
                $this->model
                    ->whereIn('municipalities_id', $allMunicipalities)
                    ->whereIn('status_id', [config('status.ENP'), config('status.ENR'), config('status.REC')])
                    ->orderBy('id', 'ASC')
                    ->get()
            );
        } else if ($rol_id == config('roles.super-root')) {
            return new BeneficiaryCollection($this->model->orderBy('id', 'ASC')->get());
        } else {
            return null;
        }
    }

    public function changeStatus($request, $id)
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        
        $beneficiarie = $this->model->findOrFail($id);

        if ($rol_id == config('roles.asistente_administrativo') || $rol_id == config('roles.coordinador_regional') || $rol_id == config('roles.metodologo') || $rol_id == config('roles.coordinador_maritimo')) {
            if ($request['status'] == "ENP") {
                $beneficiarie->status_id = config('status.ENP');
                $beneficiarie->reviewed_by = $user_id;
            }else if ($request['status'] == "ENR") {
                $beneficiarie->status_id = config('status.ENR');
                $beneficiarie->reviewed_by = $user_id;
            } else if ($request['status'] == "APR") {
                $beneficiarie->status_id = config('status.APR');
                $beneficiarie->approved_by = $user_id;
            } else if ($request['status'] == "REC") {
                $beneficiarie->status_id = config('status.REC');
                $beneficiarie->rejected_by = $user_id;
            }

            if (!empty($request['rejection_message'])) {
                $beneficiarie->rejection_message = $request['rejection_message'];
            }

            $beneficiarie->save();
        }


        // Guardamos en dataModel
        $this->control_data($beneficiarie, 'update');

        $result = new BeneficiaryResource($beneficiarie);

        return $result;
    }
}
