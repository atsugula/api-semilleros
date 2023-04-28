<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\PsychologistVisitsCollection;
use App\Http\Resources\V1\PsychologistVisitsResource;
use App\Models\psychologistVisits;
use App\Models\Beneficiary;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\CustomVisit;
use App\Traits\ImageTrait;

class CustomVisitRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new psychologistVisits();
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
    
    }

    public function findById($id){

    }


    public function update($request, $id)
    {

    }



    public function delete($id)
    {
        
    }

    public function getBeneficiary($id) {
      
    }

    public function getValidate($data, $method){
        
        $validate = [
            'theme' => 'bail|required',
            'agreements' => 'bail|required',
            'concept' => 'bail|required',
            'guardian_knows_semilleros' => 'bail|required',
            'month' => 'bail|required',
            'beneficiary' => 'bail|required',
            'municipality' => 'bail|required',
            'file' => $method != 'update' ? 'bail|required|mimes:application/pdf,pdf,png,webp,jpg,jpeg|max:' . (500 * 1049000) : 'bail',
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
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
