<?php

namespace App\Http\Controllers\V1;

use App\Http\Utilities\Validates\ListsValidates;
use App\Repositories\SidewalkRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SidewalkController extends Controller
{
    private $sidewalkRepository;
    private $listsValidates;

    function __construct(SidewalkRepository $sidewalkRepository, ListsValidates $validate)
    {
        $this->sidewalkRepository = $sidewalkRepository;
        $this->listsValidates = $validate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->sidewalkRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los corregimientos' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        // // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->listsValidates->validates($data);
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->sidewalkRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los corregimientos' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_support  $event_support
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $result = $this->sidewalkRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la informacion del corregimiento', 404);
            }
            return $this->createResponse($result, 'Los datos del corregimiento fueron encontrados');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el corregimiento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event_support  $event_support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->listsValidates->validates($data);
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->sidewalkRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la informacion el corregimiento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_support  $event_support
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->sidewalkRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el corregimiento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
