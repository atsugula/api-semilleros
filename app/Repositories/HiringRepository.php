<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\Hiring;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class HiringRepository implements CrudRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = Hiring::with('usersManager')->get();
        return $results;
    }

    public function create($request)
    {
        $hiring = Hiring::create($request);
        return $hiring;
    }

    public function findById($id)
    {
        $hiring = Hiring::findOrFail($id);
        return $hiring;
    }

    public function update($data, $id)
    {
        $hiring = Hiring::findOrFail($id);
        $hiring->update($data);
        /* $this->control_data($object,'update');
        $result = new Objects($object);*/
        return $hiring;
    }

    public function delete($id)
    {
        $hiring = Hiring::findOrFail($id);
        $hiring->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
