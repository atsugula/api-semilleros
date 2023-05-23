<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//repositorio de reportes por ficha de inscripcion
use App\Repositories\ReportRegistrationFileRepository;

class ReportRegistrationFileController extends Controller
{
    private $reportRegistrationFileRepository;

    public function __construct(ReportRegistrationFileRepository $reportRegistrationFileRepository)
    {
        $this->reportRegistrationFileRepository = $reportRegistrationFileRepository;
    }

    public function exportRegistrationFile(Request $request, $id)
    {
        // return response()->json([$id]);
        try {
            $response = $this->reportRegistrationFileRepository->generateDoc($id);
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
