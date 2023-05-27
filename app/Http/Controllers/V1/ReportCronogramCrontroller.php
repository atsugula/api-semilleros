<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ReportChronogramRepository;

class ReportCronogramCrontroller extends Controller
{

    private $reportChronogramRepository;

    public function __construct(ReportChronogramRepository $reportChronogramRepository)
    {
        $this->reportChronogramRepository = $reportChronogramRepository;
    }

    public function exportChronogram(Request $request)
    {
        try {
            $response = $this->reportChronogramRepository->generateDoc($request->id);
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


