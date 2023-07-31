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
        $data = $this->repository->ChronogramMetodologozip();
        return response()->json($data);
    }

    public function GenerateBenefisiaries(){
        $data = $this->repository->BenefisiarieZip();
        return response()->json($data);
    }

}
