<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use App\Repositories\psychologistVisitsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class psychologistVisitController extends Controller
{
    private $repository;

    function __construct(psychologistVisitsRepository $psychologistVisits)
    {
        $this->repository = $psychologistVisits;
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       try{
            $results = $this->repository->getAll();        
            if($results != null){
                return $results->toArray($request);
            }else{
                throw new \Exception('No está autorizado.');
            }
       }catch(\Exception $ex){
        return $this->createErrorResponse([], 'Algo salio mal al listar las visitas psicológicas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
       }
    }

    public function store(Request $request)
    {
        //
    } 

    public function show($id)
    {
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

}

