<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\ZoneUser;

class UsersZonesRepository implements CrudRepositoryInterface
{

    public function getAll()
    {
        //$results = new ZonesCollection(Zone::orderBy('id', 'DESC')->get());
        $results = ZoneUser::with('users', 'zone')->get();
        return $results;
    }

    public function create($request)
    {

        $zoneUser = ZoneUser::create($request);
        /*    $this->control_data($zone,'store');
        $results = new ZoneUser($zone);*/
        return $zoneUser;
    }

    public function findById($id)
    {
        $zoneUser = ZoneUser::findOrFail($id);
        // $result = new ZoneUser($zoneUser);
        return $zoneUser;
    }

    public function update($data, $id)
    {
        $zoneUser = ZoneUser::findOrFail($id);
        $zoneUser->update($data);
        // $this->control_data($zoneUser,'update');
        // $result = new ZoneUser($zoneUser);
        return $zoneUser;
    }

    public function delete($id)
    {
        $zoneUser = ZoneUser::findOrFail($id);
        $zoneUser->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
