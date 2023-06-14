<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\MunicipalityUser;
use App\Models\DisciplineUser;
use App\Models\User;
use App\Models\ZoneUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function getMonitorByAuth(){
        $authUser = Auth::user();
        $userZonesAuth = ZoneUser::where('user_id', $authUser->id)->pluck('zones_id');
        // return $userZonesAuth;

        $usersMonitorAuth = User::select(DB::raw("CONCAT(name, ' ', lastname) as label"), 'id as value')
            ->whereHas('roles', function ($query) {
                $query->where('role_id', 12);
            })
            ->whereHas('zone', function ($query) use($userZonesAuth){
                $query->whereIn('zones_id', $userZonesAuth);
            })
        ->get();
        return $usersMonitorAuth;
    }
}
