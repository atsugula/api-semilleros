<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CoordinatorVisitsRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CoordinatorVistsController extends Controller
{
    private $coordinatorVisitRepository;

    function __construct(CoordinatorVisitsRepository $coordinatorVisitRepository)
    {
        $this->coordinatorVisitRepository = $coordinatorVisitRepository;
    }

    public function index(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->coordinatorVisitRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las visitas del Coordinador' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->coordinatorVisitRepository->getValidate($data, 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $result = $this->coordinatorVisitRepository->create($request);
            return $this->createResponse($result, 'La visita del Coordinador fue creada correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al guardar la visita del Coordinador ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function show($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $result = $this->coordinatorVisitRepository->findById($id);
            if (empty($result)) {
                return $this->createErrorResponse($result, 'No se encontró la visita del Coordinador', 404);
            }
            return $this->createResponse($result, 'La visita del Coordinador fue encontrado.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar la visita del Coordinador' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->coordinatorVisitRepository->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $result = $this->coordinatorVisitRepository->update($request, $id);
            return $this->createResponse($result, 'La visita del Coordinadorfue actualizado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la visita del Coordinador' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function destroy($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $result = $this->coordinatorVisitRepository->delete($id);
            return $result;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la visita del Coordinador ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
