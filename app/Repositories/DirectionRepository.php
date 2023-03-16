<?php

namespace App\Repositories;

use App\Http\Resources\V1\DirectionCollection;
use App\Models\Direction;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class DirectionRepository
{
    use FunctionGeneralTrait, UserDataTrait;
    public function getAll()
    {
        $results = new DirectionCollection(Direction::orderBy('id', 'DESC')->get());
        return $results;
    }
}
