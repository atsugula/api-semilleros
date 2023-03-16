<?php

namespace App\Repositories;

use App\Http\Resources\V1\DisciplineCollection;
use App\Http\Resources\V1\ZonesCollection;
use App\Http\Resources\V1\ZonesResource;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\Zone;
use App\Models\ZoneUser;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class ZonesRepository implements CrudRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll(){
        //$results = new ZonesCollection(Zone::orderBy('id', 'DESC')->get());
        $results = ZoneUser::with('users')->get();
        return $results;
    }

    public function create($request)
    {
        $zone = Zone::create($request);
        $this->control_data($zone,'store');
        $results = new Zone($zone);
        return $results;
    }

    public function findById($id)
    {
        $zone = Zone::findOrFail($id);
        $result = new ZonesResource($zone);
        return $result;
    }

    public function update($data, $id)
    {
        $zone = Zone::findOrFail($id);
        $zone->update($data);
        $this->control_data($zone,'update');
        $result = new Zone($zone);
        return $result;
    }

    public function delete($id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

}
