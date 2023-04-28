<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\psychologistVisitsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class psychologistVisitsController extends Controller
{
    private $repository;

    function __construct(psychologistVisitsRepository $psychologistVisits)
    {
        $this->repository = $psychologistVisits;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = $this->repository->getValidate($request->all(), 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }

            $result = $this->repository->create($request);

            return $this->createResponse($result, 'Visita creada');
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
    public function indexByMonitor($id)
    {
        try {
            $results = $this->repository->findByCreator($id);
            return $this->createResponse($results,'Visitas creadas por el monitor');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las disciplinas deportivas' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
       try {
        $validator = $this->repository->getValidate($request->all(), 'update');

        if ($validator->fails()) {
            return  $this->createErrorResponse([], $validator->errors()->first(), 422);
        }

        $result = $this->repository->update($request, $id);

        return $this->createResponse($result, 'Visita psicologica editada');
    } catch (\Exception $ex) {
        return  $this->createErrorResponse([], 'Algo salio mal al actualizar visita psicologica ' . $ex->getMessage() . ' linea ' . $ex->getCode());
    }
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

    public function show($id)
    {
        $psychologicalVisit = DB::select('SELECT * FROM get_psychological_visit_info WHERE id = ?', [$id]);

        if (!$psychologicalVisit) {
            return response()->json(['message' => 'Visita psicológica no encontrada'], 404);
        }

        return response()->json($psychologicalVisit, 200);
    }
}
