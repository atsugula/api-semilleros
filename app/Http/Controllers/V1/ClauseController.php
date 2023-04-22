<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\ClauseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClauseController extends Controller
{
    private $clauseRepository;
    private $dropDownListsValidates;

    function __construct(ClauseRepository $clauseRepository, dropDownListsValidates $validate)
    {
        $this->clauseRepository = $clauseRepository;
        $this->dropDownListsValidates = $validate;
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
            $results = $this->clauseRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las clausulas' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            // $data = $request->all();
            // $data['user_id'] = Auth::id();

            $results = $this->clauseRepository->create($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las clausulas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        // Gate::authorize('haveaccess');
        try {
            $result = $this->clauseRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la clausula', 404);
            }
            return $this->createResponse($result, 'La clausula fue encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la clausula ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $data['user_id'] = Auth::id();

            $results = $this->clauseRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la clausula ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        // Gate::authorize('haveaccess');
        try {
            $results = $this->clauseRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la clausula ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function findByContractor($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $result = $this->clauseRepository->findByContractor($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la clausula', 404);
            }
            return $this->createResponse($result, 'La clausula fue encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la clausula ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function control(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->clauseRepository->control($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al editar las clausulas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
