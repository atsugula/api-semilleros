<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\Ethnicity;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class EthnicityRepository implements CrudRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = Ethnicity::all();
        return $results;
    }

    public function create($request)
    {
        $ethnicity = Ethnicity::create($request);
        return $ethnicity;
    }

    public function findById($id)
    {
        $ethnicity = Ethnicity::findOrFail($id);
        return $ethnicity;
    }

    public function update($data, $id)
    {
        $ethnicity = Ethnicity::findOrFail($id);
        $ethnicity->update($data);
        /* $this->control_data($object,'update');
        $result = new Objects($object);*/
        return $ethnicity;
    }

    public function delete($id)
    {
        $ethnicity = Ethnicity::findOrFail($id);
        $ethnicity->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
