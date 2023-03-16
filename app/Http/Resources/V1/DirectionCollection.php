<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DirectionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "success" => true,
            "action" => "Consulta de  direcciones",
            'items'=>$this->collection,
            'meta'=>[
                'organization'=>'Direcciones',
                'authors'=>'Jose David'
            ],
            'type'=>'Direcciones'
           ];
    }
}
