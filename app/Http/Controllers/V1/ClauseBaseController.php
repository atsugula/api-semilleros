<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\ClausesBaseRepository;
use Illuminate\Http\Request;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use Illuminate\Support\Facades\Gate;

class ClauseBaseController extends Controller
{
    use FunctionGeneralTrait, UserDataTrait;

    private $clauseBaseRepository;

    function __construct(ClausesBaseRepository $clauseBaseRepository)
    {
        $this->clauseBaseRepository = $clauseBaseRepository;
    }

    /**
     * It's a function that returns a list of clauses
     *
     * @param Request request The incoming request.
     *
     * @return The method returns a collection of clauses.
     */
    public function index(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $results = $this->clauseBaseRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las clausulas' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * It creates a new clause.
     *
     * @param Request request The request object.
     */
    public function store(Request $request)
    {
        // Gate::authorize('haveaccess');
        try {
            $data = $request->all();
            // $data['user_id'] = Auth::id();

            $results = $this->clauseBaseRepository->create($data);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las clausulas ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
        return $results;
    }

    /**
     * It shows the clause by id
     *
     * @param id The id of the clause to show
     *
     * @return The clause is being returned.
     */
    public function show($id)
    {
        // Gate::authorize('haveaccess');
        try {
            $result = $this->clauseBaseRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la clausula', 404);
            }
            return $this->createResponse($result, 'La clausula fue encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la clausula ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
