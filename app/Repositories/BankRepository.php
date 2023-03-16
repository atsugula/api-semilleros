<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\Bank;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class BankRepository implements CrudRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = Bank::all();
        return $results;
    }

    public function create($request)
    {
        $banck = Bank::create($request);
        return $banck;
    }

    public function findById($id)
    {
        $banck = Bank::findOrFail($id);
        return $banck;
    }

    public function update($data, $id)
    {
        $banck = Bank::findOrFail($id);
        $banck->update($data);
        /* $this->control_data($object,'update');
        $result = new Objects($object);*/
        return $banck;
    }

    public function delete($id)
    {
        $banck = Bank::findOrFail($id);
        $banck->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
