<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\PsychologistVisitsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        //Gate::authorize('haveaccess');
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
}
