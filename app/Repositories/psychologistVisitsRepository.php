<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\CustomVisitCollection;
use App\Http\Resources\V1\CustomVisitResource;
use App\Http\Resources\V1\PsychologistVisitsCollection;
use App\Http\Resources\V1\PsychologistVisitsResource;
use App\Http\Resources\V1\VisitSubDirectorCollection;
use App\Http\Resources\V1\VisitSubDirectorResource;
use App\Models\psychologistVisits;
use App\Models\Beneficiary;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\DocumentVisit;
use App\Traits\ImageTrait;

class PsychologistVisitsRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;
    private $documentModel;

    function __construct()
    {
        $this->model = new psychologistVisits();
        $this->documentModel = new DocumentVisit();
    }

    public function getAll()
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $query = $this->model->query()->orderBy('id', 'DESC');

    

        switch ($rol_id) {
            case config('roles.coordinador_psicosocial'):
                $query = $query->whereNotIn('created_by', [1,2])->whereHas('createdBy.roles', function ($query) {
                    $query->where('roles.slug', 'psicologo');
                })->whereNotIn('status_id', [config('status.APR')]);
                break;

            case config('roles.psicologo'):
                $query->where('created_by', $user_id)
                ->whereNotIn('status_id', [config('status.APR')]);
                break;

            default:
                return null;
                break;
        }

        $paginate = config('global.paginate');

        // Aplicar filtros adicionales desde la URL
        $query = $this->model->scopeFilterByUrl($query);

        // Calcular número de páginas para paginación
        session()->forget('count_page_custom_visits');
        session()->put('count_page_custom_visits', ceil($query->count()/$paginate));

        return new PsychologistVisitsCollection($query->simplePaginate($paginate));
    }

    public function create($request)
    {
        
        $user_id = $this->getIdUserAuth();
        
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
            $handle_1 = $this->send_file($request, 'file', 'psychologist_visit', $PsychologistVisits->id);
            $document = new DocumentVisit();
            $document->visit_id = $PsychologistVisits->id;
            $document->type = 'psychologist_visit';
            $document->route = $handle_1['response']['payload'];
            $document->created_by = $user_id;
            $document->status = 1;
            $save &= $handle_1['response']['success'];
        }
        $results = new PsychologistVisitsResource($PsychologistVisits);
        return $results;
    }

    public function findByCreator($id){
        return new PsychologistVisitsCollection(PsychologistVisits::orderBy('id', 'DESC')->where('created_by', $id)->get());
    }

    public function findById($id){

    }


    public function update($request, $id)
    {
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

        $save = $PsychologistVisits->save();
        /* SUBIMOS EL ARCHIVO */
        if ($save) {
            $handle_1 = $this->send_file($request, 'file', 'psychologist_visit', $PsychologistVisits->id);
            $document = new DocumentVisit();
            $document->visit_id = $PsychologistVisits->id;
            $document->type = 'psychologist_visit';
            $document->route = $handle_1['response']['payload'];
            $document->created_by = $PsychologistVisits->created_by;
            $document->status = 1;
            $save &= $handle_1['response']['success'];
        }
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
    
    public function getValidate($data, $method){
        $validate = [
            'guardian_knows_semilleros' => 'bail|required',
            'month' => 'bail|required',
            'beneficiary' => 'bail|required',
            'municipality' => 'bail|required',
            'theme' => 'bail|required',
            'agreements' => 'bail|required',
            'sports_scene' => 'bail|required',
            'concept' => 'bail|required',
            'numberBeneficiaries' => 'bail|required',
            'beneficiaries_knows_project' => 'bail|required',
            'beneficiaries_knows_monthly_value' => 'bail|required',
            'monitor_organization_discipline_management' => 'bail|required',
            'objetive' => 'bail|required',
            'observations' => 'bail|required',
            'municipality_id' => 'bail|required',
            'diciplines_id' => 'bail|required',
            'date_visit' => 'bail|required',
            'monitor_id' => 'bail|required',
            'file' => $method != 'update' ? 'bail|required|mimes:application/pdf,pdf,png,webp,jpg,jpeg|max:' . (500 * 1049000) : 'bail'
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
            'date_visit' => 'Fecha de la visita',
            'theme' => 'Tema',
            'agreements' => 'Acuerdos y recomendaciones',
            'concept' => 'Concepto',
            'guardian_knows_semilleros' => '¿El padre o acudiente conoce el proyecto de Semilleros Deportivos?',
            'month' => 'Cumple con el desarrollo tecnico del mes',
            'beneficiary' => 'Beneficiario',
            'file' => 'Archivo',
            'municipality' => 'Municipio',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

}
