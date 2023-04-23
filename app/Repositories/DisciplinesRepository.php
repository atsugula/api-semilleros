<?php

namespace App\Repositories;

use App\Http\Resources\V1\DisciplineCollection;
use App\Http\Resources\V1\DisciplineResource;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\Disciplines;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class DisciplinesRepository implements CrudRepositoryInterface{
    use FunctionGeneralTrait,UserDataTrait;

    public function getAll(){
        $results = new DisciplineCollection(Disciplines::orderBy('id', 'DESC')->get());
        return $results;
    }

    public function getByMonitor($id){
        $total = Disciplines::orderBy('id', 'DESC')->with('Discipline_users')->get();
        $itemsResult = [];
        foreach ($total as $item){
            $include = false;
            foreach ($item->Discipline_users as $valor){
                if($valor->user_id == $id){
                    $include = true;
                }
            }
            if($include){
                array_push($itemsResult, $item);
            }
        }
        return new DisciplineCollection($itemsResult);
    }

    public function create($request)
    {
        $disciplines = Disciplines::create($request);

        return $disciplines;
    }

    public function findById($id)
    {
        $disciplines = Disciplines::findOrFail($id);
        $result = new DisciplineResource($disciplines);
        return $result;
    }

    public function update($data, $id)
    {
        $disiciplines = Disciplines::findOrFail($id);
        $disiciplines->update($data);
        return $disiciplines;
    }
    
    public function delete($id)
    {
        $disiciplines = Disciplines::findOrFail($id);
        $disiciplines->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
