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
            $idUser = ($request->id_user) ? $request->id_user : null;
            $results = $this->beneficiarieRepository->getAll($idUser);
            if($results != null){
                return $results->toArray($request);
            }else{
                throw new \Exception('No está autorizado.');
            }
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
            $data['document_number'] = (string)$request->document_number;

            $validator = $this->beneficiarieRepository->getValidate($data, 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 201);
            }

            $result = $this->beneficiarieRepository->create($data);
            return $this->createResponse($result, 'El beneficiario fue creado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al Crear el beneficiario ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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

        // Validamos una zona especial
        // Tiene los mismos lugares que la zona tres
        // Solo se le añadio el municipio de Zarzal
        switch ($id) {
            case '47':
                $id = 5;
                break;
            case '48':
                $id = 7;
                break;
            case '49':
                $id = 29;
                break;
            case '50':
                $id = 30;
                break;
            case '51':
                $id = 31;
                break;
            case '52':
                $id = 32;
                break;
            case '53':
                $id = 33;
                break;
            case '54':
                $id = 34;
            case '55':
                $id = 6;
                break;
            default:
                break;
        }

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
             if($results != null){
                return $results->toArray($request);
            }else{
                throw new \Exception('No está autorizado.');
            }
         } catch (\Exception $ex) {
             return  $this->createErrorResponse([], 'Algo salio mal al listar los beneficiarios ' . $ex->getMessage() . ' linea ' . $ex->getCode());
         }
     }

    /**
     * Cambia el estado de la ficha de inscripcion de Monitores.
     */
    public function changeStatus(Request $request, $id)
    {
        //return $this->beneficiarieRepository->changeStatus($request, $id);
        //Gate::authorize('haveaccess');
        try {
            $result = $this->beneficiarieRepository->changeStatus($request, $id);
            return $this->createResponse($result, 'El estado de la ficha tecnica fue cambiado correctamente.');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al cambiar el estado de la ficha tecnica ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function getAllByBenefeciaryRegion(Request $request){

        try{

        }catch(\Exception $ex){

        }

    }
}
