<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\UsersZonesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
}
