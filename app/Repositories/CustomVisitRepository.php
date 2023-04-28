<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\CustomVisitCollection;
use App\Http\Resources\V1\CustomVisitResource;
use App\Http\Resources\V1\VisitSubDirectorCollection;
use App\Http\Resources\V1\VisitSubDirectorResource;
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
        $this->model = new CustomVisit();
    }

    public function getAll()
    {
        //$rol_id = $this->getIdRolUserAuth();
        //$user_id = $this->getIdUserAuth();
        $user_id = 6;
        $rol_id = 6;

        $query = $this->model->query()->orderBy('id', 'DESC');

        switch ($rol_id) {
            case config('roles.coordinador_psicosocial'):
            case config('roles.super-root'):
            case config('roles.director_administrator'):
                $query = $query->whereNotIn('created_by', [1,2])->whereHas('createdBy.roles', function ($query) {
                    $query->where('roles.slug', 'psicologo');
                })->where('status_id', [config('status.ENR')]);
                break;

            case config('roles.psicologo'):
                $query->where('created_by', $user_id);
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

        return new CustomVisitCollection($query->simplePaginate($paginate));

    }
    public function create($request)
    {
        $user_id = $this->getIdUserAuth();

        $customVisit = $this->model;
        $customVisit->theme = $request['theme'];
        $customVisit->agreements = $request['agreements'];
        $customVisit->concept = $request['concept'];
        $customVisit->guardian_knows_semilleros = $request['guardian_knows_semilleros'];
        $customVisit->month_id = $request['month'];
        $customVisit->municipality_id = $request['municipality'];
        $customVisit->beneficiary_id = $request['beneficiary'];
        $customVisit->created_by = $user_id;
        // $customVisit->reviewed_by = $request['reviewed_by'];
        $customVisit->status_id = config('status.ENR');
        $save = $customVisit->save();

        /* SUBIMOS EL ARCHIVO */
        if ($save) {
            $handle_1 = $this->send_file($request, 'file', 'custom_visits', $customVisit->id);
            $customVisit->update(['file' => $handle_1['response']['payload']]);
            $save &= $handle_1['response']['success'];
        }

        /* GUARDAMOS EN DATAMODEL */
        // $this->control_data($customVisit, 'store');
        $results = new CustomVisitResource($customVisit);
        return $results;
    }

    public function findById($id)
    {
        $customVisit = $this->model->findOrFail($id);
        return new CustomVisitResource($customVisit);
    }

    public function update($request, $id)
    {
        $user_id = $this->getIdUserAuth();
        $rol_id = $this->getIdRolUserAuth();


        $customVisit = $this->model->findOrFail($id);

        $customVisit->theme = $request['theme'];
        $customVisit->agreements = $request['agreements'];
        $customVisit->concept = $request['concept'];
        $customVisit->guardian_knows_semilleros = $request['guardian_knows_semilleros'];
        $customVisit->month_id = $request['month'];
        $customVisit->municipality_id = $request['municipality'];
        $customVisit->beneficiary_id = $request['beneficiary'];
        $customVisit->created_by = $user_id;

        if ($rol_id == config('roles.coordinador_psicosocial')) {
            $customVisit->reviewed_by = $user_id;
            $customVisit->status_id = $request['status_id'];
            $customVisit->reject_message = $request['reject_message'];
        }

        /* ACTUALIZAMOS EL ARCHIVO */
        if ($request->hasFile('file')) {
            $handle_1 = $this->update_file($request, 'file', 'custom_visits', $customVisit->id, $customVisit->file);
            $customVisit->update(['file' => $handle_1['response']['payload']]);
        }
        /* CAMBIAMOS EL ESTADO */
        if ($request['status_id'] == config('status.REC') && $user_id == $customVisit->created_by) {
            $customVisit->status_id = config('status.ENR');
            $customVisit->reject_message = $request['reject_message'];
        }
        $customVisit->save();
        /* GUARDAMOS EN DATAMODEL */
      //  $this->control_data($customVisit, 'update');
        $results = new CustomVisitResource($customVisit);
        return $results;
    }



    public function delete($id)
    {
        $visitSubDirector = $this->model->findOrFail($id);
        $visitSubDirector->delete();
        return response()->json(['items' => 'La visita de subdirector fue eliminada correctamente.']);
    }

    public function getBeneficiary($id) {
        $beneficiary = Beneficiary::findOrFail($id);
        return new BeneficiaryResource($beneficiary);
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
