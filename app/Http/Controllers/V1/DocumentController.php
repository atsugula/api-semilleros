<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\ContractorValidates;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DocumentController extends Controller
{
    private $documentRepository;
    private $contractorValidates;

    function __construct(DocumentRepository $documentRepository, ContractorValidates $validate)
    {
        $this->documentRepository = $documentRepository;
        $this->contractorValidates = $validate;
    }

    /**
     * It returns all the documents in the database.
     *
     * @param Request request The request object.
     */
    public function index(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->documentRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los documentos' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * It creates a new document
     *
     * @param Request request The request object.
     */
    public function store(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            // $data = $request->all();
            //  $validator = $this->contractorValidates->validates($data);
            /*  if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }*/
            $results = $this->documentRepository->create($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los documentos'  . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * It shows the document by id
     *
     * @param id The id of the document to show.
     */
    public function show($id)
    {
        // // Gate::authorize('haveaccess');
        try {
            $result = $this->documentRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el documento', 404);
            }
            return $this->createResponse($result, 'El documento no fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver el documento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * It updates a document
     *
     * @param Request request The request object.
     * @param id The id of the resource you want to update.
     */
    public function update(Request $request, $id)
    {
        // // Gate::authorize('haveaccess');
        try {
            // $validator = $this->contractorValidates->validates($data);
            // if ($validator->fails()) {
            //     return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            // }
            $results = $this->documentRepository->update($request, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar el documento ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * It updates the status of documents
     *
     * @param Request request The request object.
     * @param id The id of the resource you want to update.
     */
    public function management(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            $results = $this->documentRepository->management($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al gestionar los documentos' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * It deletes a document from the database.
     *
     * @param id The id of the document to be deleted.
     */
    public function destroy(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            DB::beginTransaction();

            $results = $this->documentRepository->delete($request);

            DB::commit();
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el documento ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /*  public function document()
    {
    }*/
}
