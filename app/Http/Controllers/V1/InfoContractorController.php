<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\InfoContractorsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InfoContractorController extends Controller
{
    private $InfoContractorRepositorory;

    function __construct(InfoContractorsRepository $InfoContractorRepositorory)
    {
        $this->InfoContractorRepositorory = $InfoContractorRepositorory;
    }

    /**
     * This function is used to list all the information of the contractors.
     *
     * @param Request request The request object.
     *
     * @return A list of all the contractors
     */
    public function index(Request $request)
    {
       // // Gate::authorize('haveaccess');
        try {
            $results = $this->InfoContractorRepositorory->getAll();
            return $this->createResponse($results);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar la información de los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * This function is used to create a new contractor.
     *
     * @param Request request The request object.
     */
    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->InfoContractorRepositorory->getValidate($data, 'create');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->InfoContractorRepositorory->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar la información de los contratistas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * It shows the information of the contractor
     *
     * @param id The id of the resource you want to update.
     *
     * @return The information of the contractor
     */
    public function show($id)
    {
       // Gate::authorize('haveaccess');
        try {
            $result = $this->InfoContractorRepositorory->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró el contratista', 404);
            }
            return $this->createResponse($result, 'El contratista fue encontrado');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la información de los contratista' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * This function is used to update the information of the contractors.
     *
     * @param Request request The request object.
     * @param id The id of the resource you want to update.
     *
     * @return The results of the update method of the InfoContractorRepositorory class.
     */
    public function update(Request $request, $id)
    {
       // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            $validator = $this->InfoContractorRepositorory->getValidate($data, 'update');
            if ($validator->fails()) {
                return  $this->createErrorResponse([], $validator->errors()->first(), 422);
            }
            $results = $this->InfoContractorRepositorory->update($data, $id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al actualizar la información de los contratistas' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     *
     *
     * @param id The id of the record to be deleted.
     */
    public function destroy($id)
    {
       // Gate::authorize('haveaccess');
        try {
            $results = $this->InfoContractorRepositorory->delete($id);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al eliminar el contratista ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }
}
