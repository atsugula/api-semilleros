<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\PsychologistVisitsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class psychologistVisitsController extends Controller
{
    private $repository;

    function __construct(PsychologistVisitsRepository $psychologistVisits)
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
}
