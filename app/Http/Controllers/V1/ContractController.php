<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ContractRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContractController extends Controller
{
    private $contractRepository;

    function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Gate::authorize('haveaccess');
        try {
            $results = $this->contractRepository->getAll();
            return $this->createResponse($results);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los contratos ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        //Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $results = $this->contractRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al crear los contratos ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('haveaccess');
        try {
            $result = $this->contractRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el contrato', 404);
            }
            return $this->createResponse($result, 'El contrato fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el contrato' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $results = $this->contractRepository->update($data, $id);
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el contrato ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        Gate::authorize('haveaccess');
        try {
            $results = $this->contractRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el contrato ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function management(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            // $data = $request->all();
            $results = $this->contractRepository->management($request);
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el contrato ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function cancellation(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->contractRepository->cancellation($request);
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el contrato ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
