<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\MunicipalityUser;
use App\Models\DisciplineUser;

class MonitorsController extends Controller
{
    // Trae solo usuarios monitores
    public function getMonitoringMunicipality($id) {
        $response = MunicipalityUser::where('municipalities_id', $id)->with('users')->get();
        $users = [];
        foreach ($response as $muni) {
            foreach ($muni->users as $user) {
                if ($user->roles[0]->id == config('roles.monitor')) {
                    array_push($users, [
                        'label' => $user->name,
                        'value' => $user->id
                    ]);
                }
            }
        }
        return response()->json($users);
    }

    public function getdisiplinesMonitoring($id){
        $response = DisciplineUser::where('user_id', $id)->with('disciplines')->get();
        $disciplinesArray = []; // Cambia el nombre del array a $disciplinesArray
        foreach ($response as $disciplineUser) { // Cambia el nombre de la variable a $disciplineUser
            foreach ($disciplineUser->disciplines as $discipline) {
                array_push($disciplinesArray, [ // Cambia el nombre del array a $disciplinesArray
                    'label' => $discipline->name,
                    'value' => $discipline->id
                ]);
            }
        }
    
        return response()->json($disciplinesArray);
    }
}
