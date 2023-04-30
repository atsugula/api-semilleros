<?php

namespace App\Http\Controllers\V1;

use App\Repositories\MethodologistVisitRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class MethodologistVisitController extends Controller
{
    private $methodologistVisitRepository;

    function __construct(MethodologistVisitRepository $methodologistVisitRepository)
    {
        $this->methodologistVisitRepository = $methodologistVisitRepository;
    }

    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->methodologistVisitRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las visitas del Metodologo' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $validator = $this->methodologistVisitRepository->getValidate($request->all(), 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->methodologistVisitRepository->create($request);

            return $this->createResponse($result, 'Visita personalizada creada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al guardar la visita  ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function show($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->methodologistVisitRepository->findById($id);
            if (empty($result)) {
                return $this->createErrorResponse($result, 'No se encontró la visita del Metodologo', 404);
            }
            return $this->createResponse($result, 'La visita del Metodologo fue encontrado.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar la visita del Metodologo' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        // Gate::authorize('haveaccess');
        try {
            $validator = $this->methodologistVisitRepository->getValidate($request->all(), 'update');

            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->methodologistVisitRepository->update($request, $id);

            return $this->createResponse($result, 'Visita personalizada editada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar visita personalizada ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }


    public function destroy($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->methodologistVisitRepository->delete($id);
            return $result;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la visita del Metodologo ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /* SUBIR DOCUMENTOS A TRAVES DEL DROPZONE */
    public function uploadFiles(Request $request) {
        return response()->json($request->all(),500);
    }

}
