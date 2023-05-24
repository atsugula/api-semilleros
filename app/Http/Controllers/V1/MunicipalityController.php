<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Models\Municipalities;
use App\Models\Municipality;
use App\Repositories\MunicipalityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MunicipalityController extends Controller
{
    private $municipalityRepository;
    private $dropDownListsValidates;

    function __construct(MunicipalityRepository $municipalityRepository, dropDownListsValidates $validate)
    {
        $this->municipalityRepository = $municipalityRepository;
        $this->dropDownListsValidates = $validate;
    }

    public function index(Request $reques){
        // Gate::authorize('haveaccess');
        try{
           return  $result = $this->municipalityRepository->getAll();
        }catch(\Exception $ex){
            return  $this->createErrorResponse([], 'Algo salio mal al listar los municipios' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    public function getMunicipalitiesByRegion(Request $request, $regionId)
    {
        try {
            // Obtener los municipios de la región por su ID
            $municipios = Municipality::where('zone_id', $regionId)->pluck('name');

            // Verificar si se encontraron municipios
            if ($municipios->isEmpty()) {
                return response()->json(['error' => 'No se encontraron municipios para la región'], 404);
            }

            // Retornar los nombres de los municipios como respuesta de la API
            return response()->json($municipios);
        } catch (\Exception $e) {
            // Retornar una respuesta de error si ocurre una excepción
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
