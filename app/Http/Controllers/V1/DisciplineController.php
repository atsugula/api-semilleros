<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\DisciplinesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $disciplineRepository;


    function __construct(DisciplinesRepository $disciplineRepository)
    {
        $this->disciplineRepository = $disciplineRepository;
    }

    /**
     * The function index() is a function that is used to list all the disciplines that are in the
     * database
     *
     * @param Request request The incoming request.
     *
     * @return The method returns a collection of disciplines.
     */
    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->disciplineRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las disciplinas deportivas' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
        // Gate::authorize('haveaccess');
        try {
            $results = $this->disciplineRepository->getByMonitor($id);
            return $this->createResponse($results,'Disciplinas del monitor');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las disciplinas deportivas' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $data['user_id'] = Auth::id();

            $results = $this->disciplineRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las disciplinas deportivas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $result = $this->disciplineRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la disciplina deportiva', 404);
            }
            return $this->createResponse($result, 'La disciplina deportiva fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la disciplina deportiva ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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

            $results = $this->disciplineRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la disciplina deportiva ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $results = $this->disciplineRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar la disciplina deportiva' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
