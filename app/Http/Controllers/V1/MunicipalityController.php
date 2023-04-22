<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
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
}
