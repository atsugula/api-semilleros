<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\StatusDocument;
use App\Repositories\StatusDocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StatusDocumentController extends Controller
{
    private $statusDocumentRepository;

    function __construct(StatusDocumentRepository $statusDocumentRepository)
    {
        $this->statusDocumentRepository = $statusDocumentRepository;
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
            $results = $this->statusDocumentRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar el estado del documento' . $ex->getMessage() . ' linea ' . $ex->getCode());
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

            $results = $this->statusDocumentRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar el estado del documento' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $result = $this->statusDocumentRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el estado de este documento', 404);
            }
            return $this->createResponse($result, 'El estado del documento  fue encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el stado del documento ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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

            $results = $this->statusDocumentRepository->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el estado del documento ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    public function updateMasive(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            // $data['user_id'] = Auth::id();
            $results = $this->statusDocumentRepository->updateMasive($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el estado del documento ' . $ex->getMessage() . ' linea ' . $ex->getCode());
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
            $results = $this->statusDocumentRepository->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el estado del documento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
