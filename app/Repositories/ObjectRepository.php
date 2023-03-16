<?php

namespace App\Repositories;

use App\Http\Resources\V1\ObjectsCollection;
use App\Http\Resources\V1\ObjectsResource;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\Objects;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class ObjectRepository implements CrudRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = Objects::select('id as value', 'name as label')->orderBy('name', 'ASC')->get();
        return $results;
    }

    public function create($request)
    {
        $object = Objects::create($request);

        return $object;
    }

    public function findById($id)
    {
        $object = Objects::findOrFail($id);
        $result = new ObjectsResource($object);
        return $result;
    }

    public function update($data, $id)
    {
        $object = Objects::findOrFail($id);
        $object->update($data);
        $this->control_data($object,'update');
        $result = new Objects($object);
        return $result;
    }

    public function delete($id)
    {
        $object = Objects::findOrFail($id);
        $object->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
