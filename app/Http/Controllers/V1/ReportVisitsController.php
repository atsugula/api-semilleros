<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//repositorio de reportes por visita
use App\Repositories\ReportVisitsRepository;

class ReportVisitsController extends Controller
{
    private $reportVisitsRepository;

    public function __construct(ReportVisitsRepository $reportVisitsRepository)
    {
        $this->reportVisitsRepository = $reportVisitsRepository;
    }

    public function exportMethodologistVisit(Request $request)
    {
        try {
            $response = $this->reportVisitsRepository->generateDoc($request->id);
            if ($response instanceof \Exception) {
                return $this->createErrorResponse([], 'Algo salio mal ' . $response->getMessage() . ' linea ' . $response->getCode());
            } else {
                if (!$request->type) {
                    return $response;
                }
                return response()->json(['count' => $response]);
            }
        } catch (\Exception $ex) {
            return $this->createErrorResponse([], 'Algo salio mal ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function exportMonitorChronogram(Request $request)
    {
        try {
            $response = $this->reportVisitsRepository->generateDoc($request->id);
            if ($response instanceof \Exception) {
                return $this->createErrorResponse([], 'Algo salio mal ' . $response->getMessage() . ' linea ' . $response->getCode());
            } else {
                if (!$request->type) {
                    return $response;
                }
                return response()->json(['count' => $response]);
            }
        } catch (\Exception $ex) {
            return $this->createErrorResponse([], 'Algo salio mal ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

}
