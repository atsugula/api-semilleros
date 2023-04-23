<?php

namespace App\Http\Controllers\V1;

use App\Repositories\ValidityPeriodRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ValidityPeriodController extends Controller {

    private $validityPeriodRepository;

    function __construct(ValidityPeriodRepository $validityRepository)
    {
        $this->validityPeriodRepository = $validityRepository;
    }

    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->validityPeriodRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los periodos de vigencia' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->validityPeriodRepository->getValidate($data, 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $result = $this->validityPeriodRepository->create($data);
            return $this->createResponse($result, 'El periodo de vigencia fue creado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al guardar el periodo de vigencia ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function show($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->validityPeriodRepository->findById($id);
            if (empty($result)) {
                return $this->createErrorResponse($result, 'No se encontró el periodo de vigencia', 404);
            }
            return $this->createResponse($result, 'El periodo de vigencia fue encontrado.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los periodos de vigencia' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->validityPeriodRepository->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $result = $this->validityPeriodRepository->update($data);
            return $this->createResponse($result, 'El periodo de vigencia fue actualizado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el periodo de vigencia ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function destroy($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->validityPeriodRepository->delete($id);
            return $result;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el periodo de vigencia ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
