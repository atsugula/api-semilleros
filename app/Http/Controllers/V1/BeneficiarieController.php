<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
//use App\Models\Document;
use App\Repositories\BeneficiarieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BeneficiarieController extends Controller
{

    private $beneficiarieRepositorory;

    function __construct(BeneficiarieRepository $beneficiarieRepositorory)
    {
        $this->beneficiarieRepositorory = $beneficiarieRepositorory;
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
            $results = $this->beneficiarieRepositorory->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los beneficiarios ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            
            $validator = $this->beneficiarieRepositorory->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            
            $result = $this->beneficiarieRepositorory->create($data);
            return $this->createResponse($result, 'El beneficiario fue creado correctamente.');

        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los beneficiarios ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        Gate::authorize('haveaccess');
        try {
            $result = $this->beneficiarieRepositorory->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el beneficiario', 404);
            }
            return $this->createResponse($result, 'El beneficiario fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el beneficiario' . $ex->getMessage() . ' linea ' . $ex->getCode());
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

            $validator = $this->beneficiarieRepositorory->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            
            $result = $this->beneficiarieRepositorory->update($data, $id);

            return $this->createResponse($result, 'El beneficiario fue modificado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el beneficiario ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        // Gate::authorize('haveaccess');
        try {
            $results = $this->beneficiarieRepositorory->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el beneficiario ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }




}
