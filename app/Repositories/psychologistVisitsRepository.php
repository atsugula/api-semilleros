<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\CustomVisitCollection;
use App\Http\Resources\V1\CustomVisitResource;
use App\Http\Resources\v1\PsychologistVisitsResource;
use App\Http\Resources\V1\VisitSubDirectorCollection;
use App\Http\Resources\V1\VisitSubDirectorResource;
use App\Models\PsychologistVisits;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\CustomVisit;
use App\Traits\ImageTrait;

class PsychologistVisitsRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new PsychologistVisits();
    }

    public function getAll()
    {
   
    }

    public function create($request)
    {
        
        //$user_id = $this->getIdUserAuth();
        $user_id = 1;
        $PsychologistVisits = $this->model;
        $PsychologistVisits->scenery = $request['sports_scene'];
        $PsychologistVisits->number_beneficiaries = $request['numberBeneficiaries'];
        $PsychologistVisits->beneficiaries_knows_project = $request['beneficiaries_knows_project'];
        $PsychologistVisits->beneficiaries_knows_monthly_value = $request['beneficiaries_knows_monthly_value'];
        $PsychologistVisits->monitor_organization_discipline_management  = $request['monitor_organization_discipline_management'];
        $PsychologistVisits->objetive = $request['objetive'];
        $PsychologistVisits->observations = $request['observations'];
        $PsychologistVisits->description = $request['description'];
        $PsychologistVisits->municipalities_id = $request['municipality_id'];
        $PsychologistVisits->diciplines_id = $request['diciplines_id'];
        $PsychologistVisits->monitor_id = $request['monitor_id'];
        $PsychologistVisits->created_by = $user_id;
        $PsychologistVisits->status_id = 2;
        $PsychologistVisits->evidence = "";
        $PsychologistVisits->rejection_message = "";
        $PsychologistVisits->date_visit = $request['date_visit'];
        $save = $PsychologistVisits->save();
        /* SUBIMOS EL ARCHIVO */
        if ($save) {
            $handle_1 = $this->send_file($request, 'file', 'subdirector_visit', $PsychologistVisits->id);
            //$PsychologistVisits->update(['file' => $handle_1['response']['payload']]);
            $save &= $handle_1['response']['success'];
        }
        $results = new PsychologistVisitsResource($PsychologistVisits);
        return $results;
    }

    public function findById($id){

    }


    public function update($request, $id)
    {
        $user_id = $this->getIdUserAuth();
        $rol_id = $this->getIdRolUserAuth();

        $PsychologistVisits = $this->model->findOrFail($id);
        $PsychologistVisits->date_visit = $request['date_visit'];
        $PsychologistVisits->municipalities_id = $request['municipality_id'];
        $PsychologistVisits->monitor_id = $request['monitor_id'];
        $PsychologistVisits->diciplines_id = $request['diciplines_id'];
        $PsychologistVisits->scenery = $request['sports_scene'];
        $PsychologistVisits->number_beneficiaries = $request['numberBeneficiaries'];
        $PsychologistVisits->objetive = $request['objetive'];
        $PsychologistVisits->beneficiaries_knows_project = $request['beneficiaries_knows_project'];
        $PsychologistVisits->beneficiaries_knows_monthly_value = $request['beneficiaries_knows_monthly_value'];
        $PsychologistVisits->monitor_organization_discipline_management  = $request['monitor_organization_discipline_management'];
        $PsychologistVisits->observations = $request['observations'];
        $PsychologistVisits->description = $request['description'];
        $PsychologistVisits->status_id = $PsychologistVisits->status_id == 4 ? 2: $PsychologistVisits->status_id;

        $PsychologistVisits->save();
        /* GUARDAMOS EN DATAMODEL */
        $this->control_data($PsychologistVisits, 'update');
        $results = new PsychologistVisitsResource($PsychologistVisits);
        return $results;
    }



    public function delete($id)
    {
        
    }

    public function getBeneficiary($id) {
      
    }
    /*
        'scenery',
        'number_beneficiaries',
        'beneficiaries_recognize_name',
        'beneficiary_recognize_value',
        'all_ok',
        'description',
        'observations',
        'evidence',
        'municipalities_id',
        'diciplines_id',
        'monitor_id',
        'created_by',
        'reviewed_by',
        'status_id',
        'reject_message',
*/
    public function getValidate($data, $method){
        $validate = [
            'sports_scene' => 'bail|required',
            'numberBeneficiaries' => 'bail|required',
            'beneficiaries_knows_project' => 'bail|required',
            'beneficiaries_knows_monthly_value' => 'bail|required',
            'monitor_organization_discipline_management' => 'bail|required',
            'objetive' => 'bail|required',
            'observations' => 'bail|required',
            'evidence' => 'bail|required',
            'municipality_id' => 'bail|required',
            'diciplines_id' => 'bail|required',
            'date_visit' => 'bail|required',
            'monitor_id' => 'bail|required'
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'sports_scene' => 'Escenario',
            'numberBeneficiaries' => 'Numero de benficiarios',
            'beneficiaries_knows_project' => 'Nombre reconocible de los beneficiarios',
            'beneficiaries_knows_monthly_value' => 'Valor reconocible de los beneficiarios',
            'monitor_organization_discipline_management' => 'Monitor encargado',
            'objetive' => 'Descripcion',
            'observations' => 'Observacion',
            'municipality_id' => 'Id del municipio',
            'diciplines_id' => 'Id de la diciplina',
            'monitor_id' => 'Id del monitor',
            'date_visit' => 'Fecha de la visita'
        ];
        return $this->validator($data, $validate, $messages, $attrs);
    }

}
