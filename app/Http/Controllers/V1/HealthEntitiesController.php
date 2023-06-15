<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\HealthEntities;

class HealthEntitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $list = HealthEntities::orderBy('entity')->get();
            return $list;
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar las entidades de salud' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
