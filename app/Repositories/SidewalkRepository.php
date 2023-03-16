<?php

namespace App\Repositories;

use App\Http\Resources\V1\SidewalkCollection;
use App\Http\Resources\V1\SidewalkResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\Sidewalk;

class SidewalkRepository
{

    use FunctionGeneralTrait;

    private $model;

    function __construct()
    {
        $this->model = new Sidewalk();
    }

    public function getAll()
    {
        $results = new SidewalkCollection($this->model::orderBy('name', 'ASC')->get());
        return $results;
    }

    public function create($request)
    {
        $sidewalk = $this->model::create($request);
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        $this->control_data($sidewalk,'store');
        $result = new SidewalkResource($sidewalk);
        return $result;
    }

    public function findById($id)
    {
        $sidewalk = $this->model::findOrFail($id);
        $result = new SidewalkResource($sidewalk);
        return $result;
    }

    public function update($data, $id)
    {
        $sidewalk = $this->model::findOrFail($id);
        $sidewalk->update($data);
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        // $this->control_data($sidewalk, 'update');
        $result = new SidewalkResource($sidewalk);
        return $result;
    }

    public function delete($id)
    {
        $sidewalk = $this->model::findOrFail($id);
        $sidewalk->delete();
        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
