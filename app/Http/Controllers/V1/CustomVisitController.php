<?php

namespace App\Http\Controllers\V1;

use App\Repositories\CustomVisitRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CustomVisitController extends Controller
{

    private $repository;

    function __construct(CustomVisitRepository $customVisit)
    {
        $this->repository = $customVisit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //// Gate::authorize('haveaccess');
        try {
            $results = $this->repository->getAll();
            if ($results != null){
                return $results->toArray($request);
            } else {
                throw new \Exception('No está autorizado.', 401);
            }

        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las visitas personalizadas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // // Gate::authorize('haveaccess');
        try {
            $validator = $this->repository->getValidate($request->all(), 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->repository->create($request);

            return $this->createResponse($result, 'Visita personalizada creada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al guardar la visita personalizada ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //// Gate::authorize('haveaccess');
        try {
            $result = $this->repository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la visita personalizada', 202);
            }
            return $this->createResponse($result, 'Visita personalizada encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver visita personalizada ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //// Gate::authorize('haveaccess');
        try {
            $validator = $this->repository->getValidate($request->all(), 'update');

            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->repository->update($request, $id);

            return $this->createResponse($result, 'Visita personalizada editada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar visita personalizada ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function getBeneficiary($id) {

       // // Gate::authorize('haveaccess');
        try {
            $result = $this->repository->getBeneficiary($id);

            return $this->createResponse($result, 'Beneficiario encontrado.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al buscar el beneficiario ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //// Gate::authorize('haveaccess');
        try {
            $result = $this->repository->delete($id);

            return $this->createResponse($result, 'Visita personalizada eliminada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar visita personalizada ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
