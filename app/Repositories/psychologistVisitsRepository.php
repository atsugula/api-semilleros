<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\PsychologistVisitsCollection;
use App\Http\Resources\V1\PsychologistVisitsResource;
use App\Models\psychologistVisits;
use App\Models\Beneficiary;
use App\Models\RoleUser;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Traits\ImageTrait;

class psychologistVisitsRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new psychologistVisits();
    }

    public function getAll($iduser)
    {
        if($iduser != null){
            $user_id = $iduser;
            $rol_id = RoleUser::where('user_id', $iduser)->first()->role_id;
        }else{
            $user_id = $this->getIdUserAuth();
            $rol_id = $this->getIdRolUserAuth();
        }
        // $rol_id = 6;
        // $user_id = 6;

        $query = $this->model->query()->orderBy('id', 'DESC');

        switch ($rol_id) {
            case config('roles.coordinador_psicosocial'):
                $query =  $query->whereHas('createdBY', function ($query) use ($user_id){
                        $query->where('users.methodology_id', $user_id);
                    });
            case config('roles.super-root'):
            case config('roles.director_administrator'):
                $query = $query->whereNotIn('created_by', [1,2])->whereHas('createdBy.roles', function ($query) {
                    $query->where('roles.slug', 'psicologo')->where('status_id', [config('status.ENR')]);
                });
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
        session()->forget('count_page_visits');
        session()->put('count_page_visits', ceil($query->count()/$paginate));

        return new PsychologistVisitsCollection($query->simplePaginate($paginate));
    }
    public function create($request)
    {
        $user_id = $this->getIdUserAuth();
        // $user_id = 320;

        $PsychologistVisit = $this->model;
        $PsychologistVisit->scenery = $request['scenery'];
        $PsychologistVisit->objetive = $request['objetive'];
        $PsychologistVisit->number_beneficiaries = $request['number_beneficiaries'];
        $PsychologistVisit->beneficiaries_recognize_name = $request['beneficiaries_recognize_name'];
        $PsychologistVisit->beneficiary_recognize_value = $request['beneficiary_recognize_value'];
        $PsychologistVisit->all_ok = $request['all_ok'];
        $PsychologistVisit->description = $request['description'];
        $PsychologistVisit->observations = $request['observations'];
        $PsychologistVisit->municipalities_id = $request['municipalities_id'];
        $PsychologistVisit->date_visit = $request['municipalities_id'];
        $PsychologistVisit->diciplines_id = $request['diciplines_id'];
        $PsychologistVisit->monitor_id = $request['monitor'];
        $PsychologistVisit->date_visit = $request['date_visit'];
        $PsychologistVisit->created_by = $user_id;
        $PsychologistVisit->status_id = config('status.ENR');
        $save = $PsychologistVisit->save();

        /* SUBIMOS EL ARCHIVO */
        if ($save) {
           $handle_1 = $this->send_file($request, 'file', 'psychological_visits', $PsychologistVisit->id);
           $PsychologistVisit->update(['file' => $handle_1['response']['payload']]);
           $save &= $handle_1['response']['success'];
        }

        $results = new PsychologistVisitsResource($PsychologistVisit);
        return $results;
    }



    public function findById($id){

        $PsychologistVisit = $this->model->findOrFail($id);
        return new PsychologistVisitsResource($PsychologistVisit);

    }


    public function update($request, $id)
    {
        $user_id = $this->getIdUserAuth();
        $rol_id = $this->getIdRolUserAuth();

        // $user_id = 6;
        // $rol_id = 6;

        $PsychologistVisit = $this->model->findOrFail($id);

        if ($rol_id == config('roles.psicologo')){
            $PsychologistVisit->scenery = $request['scenery'];
            $PsychologistVisit->objetive = $request['objetive'];
            $PsychologistVisit->number_beneficiaries = $request['number_beneficiaries'];
            $PsychologistVisit->beneficiaries_recognize_name = $request['beneficiaries_recognize_name'];
            $PsychologistVisit->beneficiary_recognize_value = $request['beneficiary_recognize_value'];
            $PsychologistVisit->all_ok = $request['all_ok'];
            $PsychologistVisit->description = $request['description'];
            $PsychologistVisit->observations = $request['observations'];
            $PsychologistVisit->municipalities_id = $request['municipalities_id'];
            $PsychologistVisit->diciplines_id = $request['diciplines_id'];
            $PsychologistVisit->date_visit = $request['date_visit'];
        }

        if ($rol_id == config('roles.coordinador_psicosocial')) {
            $PsychologistVisit->reviewed_by = $user_id;
            $PsychologistVisit->status_id = $request['status_id'];
            $PsychologistVisit->rejection_message = $request['rejection_message'];
        }

        if ($request->hasFile('file')) {
            $handle_1 = $this->update_file($request, 'file', 'PsychologistVisit', $PsychologistVisit->id, $PsychologistVisit->file);
            $PsychologistVisit->update(['file' => $handle_1['response']['payload']]);
        }

        if ($request['status_id'] == config('status.REC') && $user_id == $PsychologistVisit->created_by) {
            $PsychologistVisit->status_id = config('status.ENR');
            $PsychologistVisit->rejection_message = '';
        }
        $PsychologistVisit->save();


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
            'scenery' => 'bail|required',
            'objetive' => 'bail|required',
            'number_beneficiaries' => 'bail|required',
            'beneficiaries_recognize_name' => 'bail|required',
            'beneficiary_recognize_value' => 'bail|required',
            'all_ok' => 'bail|required',
            'description' => 'bail|required',
            'observations' => 'bail|required',
            'municipalities_id' => 'bail|required',
            'diciplines_id' => 'bail|required',
            'monitor' => 'bail|required',
            'file' => $method != 'update' ? 'bail|required|mimes:application/pdf,pdf,png,webp,jpg,jpeg|max:' . (500 * 1049000) : 'bail',

        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'scenery' => 'escenario',
            'number_beneficiaries' => 'numero de beneficiarios',
            'beneficiaries_recognize_name' => 'saber si los beneficiarios reconocen el nombre del proyecto',
            'beneficiary_recognize_value' => 'saber si los beneficiarios reconocen el valor del proyecto',
            'all_ok' => 'saber si se observa organizacion,disciplina,buen manejo de grupo durante las sesiones de clases del monitor',
            'description' => 'descripción',
            'observations' => 'observaciones',
            'municipalities_id' => 'municipio',
            'diciplines_id' => 'disciplina',
            'monitor_id' => 'monitor',
            'file' => 'Archivo',

        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

}
