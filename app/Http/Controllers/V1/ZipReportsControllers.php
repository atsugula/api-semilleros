<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ZipReportsRepository;
use Illuminate\Http\Request;

class ZipReportsControllers extends Controller
{

    private $repository;

    function __construct(ZipReportsRepository $repositoryZIP)
    {
        $this->repository = $repositoryZIP;
    }

    //
    public function GenerateChronogramZip(Request $request){
        $data = $this->repository->ChronogramMetodologozip($request->id);
        return response()->json($data);
    }

    public function GenerateBenefisiaries(Request $request){
        $data = $this->repository->BenefisiarieZip($request->id);
        return response()->json($data);
    }

    public function TrasversalActivity(Request $request){
        $data = $this->repository->ZipTrasversalAcitvities($request->id);
        return response()->json($data);
    }

    public function CustomVisitPsycologic(Request $request){
        $data = $this->repository->ZipCustomVisits($request->id);
        return response()->json($data);
    }

    public function VisitPyscologic(Request $request){
        $data = $this->repository->ZipVisitasPsicologicas($request->id);
        return response()->json($data);
    }



}
