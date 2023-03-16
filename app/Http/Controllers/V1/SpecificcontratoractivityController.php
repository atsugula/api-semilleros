<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Validates\dropDownListsValidates;
use App\Repositories\SpecificcontratoractivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SpecificcontratoractivityController extends Controller
{

    private $SpecificcontratoractivityRepository;
    private $dropDownListsValidates;

    function __construct(SpecificcontratoractivityRepository $SpecificcontratoractivityRepository, dropDownListsValidates $validate)
    {
        $this->SpecificcontratoractivityRepository = $SpecificcontratoractivityRepository;
        $this->dropDownListsValidates = $validate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('haveaccess');
        try {
            $results = $this->SpecificcontratoractivityRepository->getAll();
            return $results->toArray($request);
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al listar los objetos' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('haveaccess');
        try {
            $result = $this->SpecificcontratoractivityRepository->findById($id);
            if (empty($result)) {
                return $this->createResponse($result, 'No se encontró la actividad', 404);
            }
            return $this->createResponse($result, 'La clausula fue encontrada');
        } catch (\Exception $ex) {
            return  $this->createErrorResponse([], 'Algo salio mal al ver la actividad ' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
