<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\MunicipalityUser;

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
}
