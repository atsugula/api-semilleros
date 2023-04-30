<?php

namespace App\Repositories;

use App\Http\Resources\V1\MethodologistVisitCollection;
use App\Http\Resources\V1\MethodologistVisitResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\MethodologistVisit;
use App\Traits\ImageTrait;
use App\Traits\UserDataTrait;

class MethodologistVisitRepository
{
    use FunctionGeneralTrait, UserDataTrait, ImageTrait;

    private $model;

    function __construct()
    {
        $this->model = new MethodologistVisit();
    }

    public function getAll()
    {

        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $query = $this->model->query();

        $results = [];

        if ($rol_id == config('roles.subdirector_tecnico')) {
            $query->whereNotIn('created_by', [1,2])
            ->whereHas('creator.roles', function ($query) {
                $query->where('roles.slug', 'metodologo');
            })
            ->where('status_id', [config('status.ENR')]);
        }
        if ($rol_id == config('roles.metodologo')) {
            $query->where('created_by', $user_id);
        }
        $paginate = config('global.paginate');
        session()->forget('count_page_visitMethodologists');
        session()->put('count_page_visitMethodologists', ceil($query->get()->count()/$paginate));

        return new MethodologistVisitCollection($query->simplePaginate($paginate));
    }
    public function create($request)
    {
        $user_id = $this->getIdUserAuth();
        $methodologist_visit = $this->model;
        $methodologist_visit->hour_visit = $request['hour_visit'];
        $methodologist_visit->date_visit = $request['date_visit'];
        $methodologist_visit->sports_scene = $request['sports_scene'];
        $methodologist_visit->beneficiary_coverage = $request['beneficiary_coverage'];
        /* BOOLEANOS CAMPOS */
        $methodologist_visit->swich_plans_r = $request['swich_plans_r'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_sc_1 = $request['swich_plans_sc_1'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_sc_2 = $request['swich_plans_sc_2'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_sc_3 = $request['swich_plans_sc_3'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_sc_4 = $request['swich_plans_sc_4'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_1 = $request['swich_plans_gm_1'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_2 = $request['swich_plans_gm_2'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_3 = $request['swich_plans_gm_3'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_4 = $request['swich_plans_gm_4'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_5 = $request['swich_plans_gm_5'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_gm_6 = $request['swich_plans_gm_6'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_mp_1 = $request['swich_plans_mp_1'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_mp_2 = $request['swich_plans_mp_2'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_mp_3 = $request['swich_plans_mp_3'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_mp_4 = $request['swich_plans_mp_4'] == "false" ? 0 : 1;
        $methodologist_visit->swich_plans_mp_5 = $request['swich_plans_mp_5'] == "false" ? 0 : 1;
        $methodologist_visit->municipalitie_id = $request['municipalitie_id'] == "false" ? 0 : 1;
        /* RELACIONES CAMPOS */
        $methodologist_visit->user_id = $request['monitor_id'];
        $methodologist_visit->sidewalk = $request['sidewalk'];
        $methodologist_visit->discipline_id = $request['discipline_id'];
        $methodologist_visit->evaluation_id = $request['evaluation_id'];
        $methodologist_visit->event_support_id = $request['event_support_id'];
        $methodologist_visit->observations = $request['observations'];
        $methodologist_visit->status_id = config('status.ENR');
        $methodologist_visit->created_by = $user_id;

        $save = $methodologist_visit->save();
        //
        if ($save) {
            $handle_1 = $this->send_file($request, 'file', 'methodologist_visit', $methodologist_visit->id);
            $methodologist_visit->update(['file' => $handle_1['response']['payload']]);
            $save &= $handle_1['response']['success'];
         }   

        // Guardamos en dataModel
        // $this->control_data($methodologist_visit, 'store');
        $results = new MethodologistVisitResource($methodologist_visit);
        return $results;
    }

    public function findById($id)
    {
        $methodologist_visit = $this->model->findOrFail($id);
        $result = new MethodologistVisitResource($methodologist_visit);
        return $result;
    }

    public function update($request)
    {

        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $methodologist_visit = $this->model->findOrFail($request['id']);
        $methodologist_visit->hour_visit = $request['hour_visit'];
        $methodologist_visit->date_visit = $request['date_visit'];
        $methodologist_visit->sports_scene = $request['sports_scene'];
        $methodologist_visit->beneficiary_coverage = $request['beneficiary_coverage'];
        /* BOOLEANOS CAMPOS */
        $methodologist_visit->swich_plans_r = $request['swich_plans_r'] ? 1 : 0;
        $methodologist_visit->swich_plans_sc_1 = $request['swich_plans_sc_1'] ? 1 : 0;
        $methodologist_visit->swich_plans_sc_2 = $request['swich_plans_sc_2'] ? 1 : 0;
        $methodologist_visit->swich_plans_sc_3 = $request['swich_plans_sc_3'] ? 1 : 0;
        $methodologist_visit->swich_plans_sc_4 = $request['swich_plans_sc_4'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_1 = $request['swich_plans_gm_1'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_2 = $request['swich_plans_gm_2'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_3 = $request['swich_plans_gm_3'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_4 = $request['swich_plans_gm_4'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_5 = $request['swich_plans_gm_5'] ? 1 : 0;
        $methodologist_visit->swich_plans_gm_6 = $request['swich_plans_gm_6'] ? 1 : 0;
        $methodologist_visit->swich_plans_mp_1 = $request['swich_plans_mp_1'] ? 1 : 0;
        $methodologist_visit->swich_plans_mp_2 = $request['swich_plans_mp_2'] ? 1 : 0;
        $methodologist_visit->swich_plans_mp_3 = $request['swich_plans_mp_3'] ? 1 : 0;
        $methodologist_visit->swich_plans_mp_4 = $request['swich_plans_mp_4'] ? 1 : 0;
        $methodologist_visit->swich_plans_mp_5 = $request['swich_plans_mp_5'] ? 1 : 0;
        $methodologist_visit->municipalitie_id = $request['municipalitie_id'] ? 1 : 0;
        /* RELACIONES CAMPOS */
        $methodologist_visit->sidewalk = $request['sidewalk'];
        $methodologist_visit->user_id = $request['user_id'];
        $methodologist_visit->discipline_id = $request['discipline_id'];
        $methodologist_visit->evaluation_id = $request['evaluation_id'];
        $methodologist_visit->event_support_id = $request['event_support_id'];
        $methodologist_visit->observations = $request['observations'];
        /* ACTUALIZAMOS EL ESTADO SOLO EL ROL AUTORIZADO */
        if ($rol_id == config('roles.subdirector_tecnico')) {
            $methodologist_visit->revised_by = $user_id;
            $methodologist_visit->status_id = $request['status_id'];
            $methodologist_visit->rejection_message = $request['reject_message'];
        }
        $methodologist_visit->save();
        // Guardamos en dataModel
        $this->control_data($methodologist_visit, 'update');
        $result = new MethodologistVisitResource($methodologist_visit);
        return $result;
    }

    public function delete($id)
    {
        $methodologist_visit = $this->model->findOrFail($id);
        $methodologist_visit->delete();
        return response()->json(['items' => 'La visita metodologo fue eliminada correctamente.']);
    }

    public function getValidate($data, $method){

        $validate = [
            'hour_visit' => 'bail|required',
            'date_visit' => 'bail|required',
            'sports_scene' => 'bail|required',
            'beneficiary_coverage' => 'bail|required',
            'swich_plans_r' => 'bail|required',
            'observations' => 'bail|required',
            'file' => $method != 'update' ? 'bail|required|mimes:application/pdf,pdf,png,webp,jpg,jpeg|max:' . (500 * 1049000) : 'bail',

        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'hour_visit' => 'Hora visita',
            'date_visit' => 'Fecha visita',
            'sports_scene' => 'Escenario deportivo',
            'beneficiary_coverage' => 'Cobertura de benificiario',
            'swich_plans_r' => 'Plan de clases',
            'observations' => 'Observaciones',
            'file' => 'Archivo',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

    /* SUBIR DOCUMENTOS A TRAVES DEL DROPZONE */
    public function uploadAll($request) {
        $files = $request->file('files');
        foreach ($files as $file) {
            // Validar cada archivo
            $request->validate([
                'file' => 'bail|required|mimes:jpeg,png,gif,pdf|max:2048',
            ]);
            // Procesar y almacenar cada archivo
            $this->send_file($request, 'file', 'methodologist_visits', 1); // El 1 está quemado de momento
            // $file->store('public');
        }
        return response()->json(['items' => 'Los archivos se han subido correctamente.']);
    }

}
