<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\ContractorValidates;
use App\Models\Contractor;
use App\Models\Document;
use App\Repositories\ContractorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContractorController extends Controller
{

    private $contractorRepositorory;
    private $contractorValidates;

    function __construct(ContractorRepository $contractorRepositorory, ContractorValidates $validate)
    {
        $this->contractorRepositorory = $contractorRepositorory;
        $this->contractorValidates = $validate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       Gate::authorize('haveaccess');
        try {
            $results = $this->contractorRepositorory->getAll();
            return $this->createResponse($results);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
       Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->contractorValidates->validates($data);
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->contractorRepositorory->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $result = $this->contractorRepositorory->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el contratista', 404);
            }
            return $this->createResponse($result, 'El contratista fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el contratista' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $validator = $this->contractorValidates->validates($data);
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->contractorRepositorory->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el contratista ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
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
            $results = $this->contractorRepositorory->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el contratista ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function revised(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->contractorRepositorory->revised();
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function clever(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->contractorRepositorory->clever();
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
