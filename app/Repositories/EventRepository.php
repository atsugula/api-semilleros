<?php

namespace App\Repositories;

use App\Http\Resources\V1\EventCollection;
use App\Http\Resources\V1\EventResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\Event_support;

class EventRepository
{

    use FunctionGeneralTrait;

    private $model;

    function __construct()
    {
        $this->model = new Event_support();
    }

    public function getAll()
    {
        $results = new EventCollection($this->model::orderBy('created_at', 'ASC')->get());
        return $results;
    }

    public function create($request)
    {
        $event = $this->model::create($request);
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        $this->control_data($event,'store');
        $result = new EventResource($event);
        return $result;
    }

    public function findById($id)
    {
        $event = $this->model::findOrFail($id);
        $result = new EventResource($event);
        return $result;
    }

    public function update($data, $id)
    {
        $event = $this->model::findOrFail($id);
        $event->update($data);
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        $this->control_data($event, 'update');
        $result = new EventResource($event);
        return $result;
    }

    public function delete($id)
    {
        $event = $this->model::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
