<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use App\Http\Resources\V1\CustomVisitCollection;
use App\Http\Resources\V1\CustomVisitResource;
use App\Http\Resources\V1\VisitSubDirectorCollection;
use App\Http\Resources\V1\VisitSubDirectorResource;
use App\Models\Beneficiary;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\CustomVisit;
use App\Traits\ImageTrait;

class CustomVisitRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        //$this->model = new ();
    }

    public function getAll()
    {
   
    }
    public function create($request)
    {
    
    }

    public function findById($id){

    }


    public function update($request, $id)
    {

    }



    public function delete($id)
    {
        
    }

    public function getBeneficiary($id) {
      
    }

    public function getValidate($data, $method){

    }

}
