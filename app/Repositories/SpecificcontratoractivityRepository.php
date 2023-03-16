<?php

namespace App\Repositories;

use App\Http\Resources\V1\SpecificcontratoractivityCollection;
use App\Http\Resources\V1\SpecificcontratoractivityResource;
use App\Models\Specificcontratoractivity;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class SpecificcontratoractivityRepository
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = new SpecificcontratoractivityCollection(Specificcontratoractivity::orderBy('name', 'DESC')->get());
        return $results;
    }

    // public function create($request)
    // {
    //     $object = Objects::create($request);

    //     return $object;
    // }

    public function findById($id)
    {
        $object = Objects::findOrFail($id);
        $result = new ObjectsResource($object);
        return $result;
    }

    // public function update($data, $id)
    // {
    //     $object = Objects::findOrFail($id);
    //     $object->update($data);
    //     $this->control_data($object,'update');
    //     $result = new Objects($object);
    //     return $result;
    // }

    // public function delete($id)
    // {
    //     $object = Objects::findOrFail($id);
    //     $object->delete();

    //     return response()->json(['message' => 'Se ha eliminado correctamente']);
    // }
}
