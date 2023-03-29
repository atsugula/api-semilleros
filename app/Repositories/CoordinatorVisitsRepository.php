<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\CoordinatorVisit;
use App\Traits\FunctionGeneralTrait;

class CoordinatorVisitsRepository implements CrudRepositoryInterface
{
    private $model;
    function __construct()
    {
        $this->model = new CoordinatorVisit();
    }

    use FunctionGeneralTrait;

    public function getAll()
    {
        $result = CoordinatorVisit::with('municipalities', 'monitor', 'disciplines')->get();
        return $result;
    }
    public function create($request)
    {
        /* RELACIONES CAMPOS */
        $coordinator_visits = $this->model;
        $coordinator_visits->hour_visit = $request['hour_visit'];
        $coordinator_visits->date_visit = $request['date_visit'];
        $coordinator_visits->sports_scene = $request['sports_scene'];
        $coordinator_visits->beneficiary_coverage = $request['beneficiary_coverage'];
        $coordinator_visits->user_id = $request['created_by'];
        $coordinator_visits->discipline_id = $request['discipline_id'];
        $coordinator_visits->municipalitie_id = $request['municipality_id'];
        //$coordinator_visits->event_support_id = $request['event_support_id'];
        $coordinator_visits->observations = $request['observations'];
        $coordinator_visits->description = $request['description'];
        $coordinator_visits->save();
        // Guardamos en dataModel
        $this->control_data($coordinator_visits, 'store');
        return $coordinator_visits;
    }

    public function findById($id)
    {
        $coordinator_visits = $this->model->findOrFail($id);
        return $coordinator_visits;
    }

    public function update($data, $id)
    {
        $coordinator_visits = $this->model->findOrFail($data['id']);
        $coordinator_visits->update($data);
        // Guardamos en dataModel
        $this->control_data($coordinator_visits, 'update');
        return $coordinator_visits;
    }

    public function delete($id)
    {
        $coordinator_visits = $this->model->findOrFail($id);
        $coordinator_visits->delete();
        return response()->json(['items' => 'La visita metodologo fue eliminada correctamente.']);
    }

    public function getValidate($data, $method)
    {

        $validate = [
            'hour_visit' => 'bail|required',
            'date_visit' => 'bail|required',
            'sports_scene' => 'bail|required',
            'beneficiary_coverage' => 'bail|required',
            'observations' => 'bail|required',
            'description' => 'bail|required',
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
            'observations' => 'Observaciones',
            'description' => 'Descripciones',
        ];

        return $this->validator($data, $validate, $messages, $attrs);
    }
}
