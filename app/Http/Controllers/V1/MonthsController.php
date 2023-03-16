<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\MonthsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MonthsController extends Controller
{
    private $monthsRepository;

    function __construct(MonthsRepository $monthsRepository)
    {
        $this->monthsRepository = $monthsRepository;
    }


    /**
     * It returns all the months in the database.
     *
     * @param Request request The request object.
     */
    public function index(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->monthsRepository->getAll();
            return $results;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los meses' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
