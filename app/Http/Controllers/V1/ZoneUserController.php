<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Models\DisciplineUser;
use App\Models\Municipality;
use App\Models\MunicipalityUser;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\ZoneUser;
use App\Repositories\UsersZonesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Database\Eloquent\Builder;


class ZoneUserController extends Controller
{
    private $usersZonesRepository;

    function __construct(UsersZonesRepository $usersZonesRepository)
    {
        $this->usersZonesRepository = $usersZonesRepository;
    }

    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->usersZonesRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las zonas de los usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $results = $this->usersZonesRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las zonas las zonas de los usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function show($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->usersZonesRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la  zona del usuario', 404);
            }
            return $this->createResponse($result, 'La zona del usuario fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la lista de zonas de usuarios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $results = $this->usersZonesRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la zona del usuario' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function destroy($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->usersZonesRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la zona del usuario' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function getUserRegionsMunicipalities($id) {
        $userId = $id; // Recibo el id del usuario que está logueado METODOLOGO
        $zoneUser = ZoneUser::where('user_id', $userId)->first(); // Obtener el primer resultado
        $municipalitiesUserRegion = Municipality::where('zone_id', $zoneUser->zones_id)
            ->orderBy("name", "ASC")
            ->get(); // Acceder al atributo id

            $users = ZoneUser::query()
            ->select([
                "users.name as user_name", "users.id as user_id",
                "disciplines.name as discipline", "disciplines.id as discipline_id",
                "role_user.role_id as role_id", "users.lastname as last_name"
            ])
            ->join("users", "users.id", "=", "zone_users.user_id")
            ->join("discipline_users", "discipline_users.user_id", "=", "users.id")
            ->join("disciplines", "discipline_users.disciplines_id", "=", "disciplines.id")
            ->join("role_user", "role_user.user_id", "=", "users.id")
            ->where("zone_users.zones_id", $zoneUser->zones_id)
            ->where("role_user.role_id", 12)
            ->get();

        return response()->json([
            "municipalities" => $municipalitiesUserRegion, "users" => $users]);
    }

    public function getMunicipalitiesUserDisciplines($id) {
        $municipalitieId = $id; // recibo el id del municipio

        // en la tabla municipios con el id del municipio obtengo la zona
        $municipality = Municipality::find($municipalitieId);
        $zoneId = $municipality->zone_id;

        $users = ZoneUser::query()
            ->select([
                "users.name as user_name", "users.id as user_id",
                "disciplines.name as discipline", "disciplines.id as discipline_id"
            ])
            ->join("users", "users.id", "=", "zone_users.user_id")
            ->join("discipline_users", "discipline_users.user_id", "=", "users.id")
            ->join("disciplines", "discipline_users.disciplines_id", "=", "disciplines.id")
            ->join("role_user", "role_user.user_id", "=", "users.id")
            ->where("zone_users.zones_id", $zoneId)
            ->where("role_user.role_id", 12)
            ->get();

        return response()->json($users);
    }
}
