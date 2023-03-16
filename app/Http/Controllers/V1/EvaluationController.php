<?php

namespace App\Http\Controllers\V1;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\EvaluantionRepository;
use App\Repositories\EvaluationsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EvaluationController extends Controller
{
    private $evaluationRepository;

    function __construct(EvaluationsRepository $evaluationRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
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
            $results = $this->evaluationRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las Evaluaciónes' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            //  $data['user_id'] = Auth::id();

            $results = $this->evaluationRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las Evaluaciónes' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('haveaccess');
        try {
            $result = $this->evaluationRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la informacion de la Evaluación', 404);
            }
            return $this->createResponse($result, 'Los datos de la Evaluación fue encontrados');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el evento de soporte' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            //  $data['user_id'] = Auth::id();

            $results = $this->evaluationRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la informacion de la Evaluación' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->evaluationRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la Evaluación' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
