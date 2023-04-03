<?php

namespace App\Http\Controllers\V1;

use App\Repositories\ChronogramRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChronogramController extends Controller {

    private $chronogramRepository;

    function __construct(ChronogramRepository $chronogramRepository)
    {
        $this->chronogramRepository = $chronogramRepository;
    }

    public function index(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->chronogramRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los cronogramaa' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->chronogramRepository->getValidate($data, 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $result = $this->chronogramRepository->create($data);
            return $this->createResponse($result, 'El cronograma fue creado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al guardar el cronograma ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function show($id)
    {
        Gate::authorize('haveaccess');
        try {
            $result = $this->chronogramRepository->findById($id);
            if (empty($result)) {
                return $this->createErrorResponse($result, 'No se encontró el cronograma', 404);
            }
            return $this->createResponse($result, 'El cronograma fue encontrado.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los cronogramas' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $validator = $this->chronogramRepository->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $data['id'] = $id;
            $result = $this->chronogramRepository->update($data);
            
            return $this->createResponse($result, 'El cronograma fue actualizado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el cronograma ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function destroy($id)
    {
        Gate::authorize('haveaccess');
        try {
            $result = $this->chronogramRepository->delete($id);
            return $result;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el cronograma ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}