<?php

namespace App\Repositories;

use App\Http\Resources\V1\MethodologistVisitCollection;
use App\Http\Resources\V1\MethodologistVisitResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\MethodologistVisit;
use App\Traits\ImageTrait;

class MethodologistVisitRepository
{
    use ImageTrait;

    private $model;

    function __construct()
    {
        $this->model = new MethodologistVisit();
    }

    use FunctionGeneralTrait;

    public function getAll()
    {
        $methodologist_visits = new MethodologistVisitCollection($this->model->orderBy('id', 'DESC')->get());
        return $methodologist_visits;
    }
    public function create($request)
    {
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
        $methodologist_visit->sidewalk_id = $request['sidewalk_id'];
        $methodologist_visit->user_id = $request['user_id'];
        $methodologist_visit->discipline_id = $request['discipline_id'];
        $methodologist_visit->evaluation_id = $request['evaluation_id'];
        $methodologist_visit->event_support_id = $request['event_support_id'];
        $methodologist_visit->observations = $request['observations'];
        $methodologist_visit->save();
        // Guardamos en dataModel
        $this->control_data($methodologist_visit, 'store');
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
        $methodologist_visit->sidewalk_id = $request['sidewalk_id'];
        $methodologist_visit->user_id = $request['user_id'];
        $methodologist_visit->discipline_id = $request['discipline_id'];
        $methodologist_visit->evaluation_id = $request['evaluation_id'];
        $methodologist_visit->event_support_id = $request['event_support_id'];
        $methodologist_visit->observations = $request['observations'];
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
