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

    private $beneficiarieRepository;

    function __construct(BeneficiarieRepository $beneficiarieRepository)
    {
        $this->beneficiarieRepository = $beneficiarieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->beneficiarieRepository->getAll();
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
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $validator = $this->beneficiarieRepository->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->beneficiarieRepository->create($data);
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
        // Gate::authorize('haveaccess');
        try {
            $result = $this->beneficiarieRepository->findById($id);
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
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();

            $validator = $this->beneficiarieRepository->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->beneficiarieRepository->update($data, $id);

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
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->beneficiarieRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el beneficiario ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }


    // Trae solo beneficiarios por municipio
    public function getBeneficiariesMunicipality($id)
    {
        $response = Beneficiary::where('municipalities_id', $id)->get();
        $beneficiaries = [];
        foreach ($response as $bene) {
            array_push($beneficiaries, [
                'label' => $bene->full_name,
                'value' => $bene->id
            ]);
        }
        return response()->json($beneficiaries);
    }

    /**
     * Listado filtrado
     */

     public function getAllByUserRegion(Request $request)
     {
        //Gate::authorize('haveaccess');
         try {
             $results = $this->beneficiarieRepository->getAllByUserRegion();
             return $results->toArray($request);
         } catch (\Exception $ex) {
             return  $this->createErrorResponse([], 'Algo salio mal al listar los beneficiarios ' . $ex->getMessage() . ' linea ' . $ex->getCode());
         }
     }

    /**
     * Cambia el estado de la ficha de inscripcion de Monitores.
     */
    public function changeStatus(Request $request, $id)
    {
        //var_dump($request->all);
        //die;
        //Gate::authorize('haveaccess');
        try {
            $result = $this->beneficiarieRepository->changeStatus($request, $id);
            
            return $this->createResponse($result, 'El estado de la ficha tecnica fue cambiado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al cambiar el estado de la ficha tecnica ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
