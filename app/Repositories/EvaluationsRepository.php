<?php

namespace  App\Repositories;

use App\Http\Resources\V1\EvaluationCollection;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\Evaluation;

class EvaluationsRepository implements CrudRepositoryInterface{

        public function getAll()
        {
            $results = new EvaluationCollection(Evaluation::orderBy('name', 'ASC')->get());
            return $results;
        }

        public function create($request)
        {
            $evaluation = Evaluation::create($request);
            /*  $this->control_data($event,'store');
            $results = new Event_support($event);*/
            return $evaluation;
        }

        public function findById($id)
        {
            $evaluation = Evaluation::findOrFail($id);
            return $evaluation;
        }

        public function update($data, $id)
        {
            $evaluation = Evaluation::findOrFail($id);
            $evaluation->update($data);
            // Guardamos en dataModel
            //$this->control_data($entityName, 'update');
            //  $result = new EntityNameResource($event);
            return $evaluation;
        }

        public function delete($id)
        {
            $evaluation = Evaluation::findOrFail($id);
            $evaluation->delete();

            return response()->json(['message' => 'Se ha eliminado correctamente']);
        }
}
