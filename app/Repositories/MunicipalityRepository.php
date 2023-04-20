<?php

namespace App\Repositories;

use App\Http\Resources\V1\MunicipalityCollection;
use App\Models\Municipality;

class MunicipalityRepository{

    public function getAll(){
        $result = new MunicipalityCollection(Municipality::orderBy('id', 'DESC')->get());
        return $result;
    }

    public function getByUser($IdUser){
        $result = Municipality::orderBy('id', 'DESC')->user()->where('user.municipalities_id',$IdUser)->get();
        return $result;
    }
}
