<?php

namespace App\Http\Controllers;
use App\Repositories\psychologistVisitsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class psychologistVisitsController extends Controller
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
        // Código para guardar una nueva visita psicológica
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
