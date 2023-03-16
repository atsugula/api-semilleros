<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\DirectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DirectionController extends Controller
{
    private $directionRepository;
    private $dropDownListsValidates;

    function __construct(DirectionRepository $directionRepository, dropDownListsValidates $validate)
    {
        $this->directionRepository = $directionRepository;
        $this->dropDownListsValidates = $validate;
    }

    public function index(Request $request){
       Gate::authorize('haveaccess');
        try{
           return  $result = $this->directionRepository->getAll();
        }catch(\Exception $ex){
            return  $this->createErrorResponse([], 'Algo salio mal al listar las direcciones' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
