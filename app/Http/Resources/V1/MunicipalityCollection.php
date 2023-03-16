<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MunicipalityCollection extends ResourceCollection
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
            "action" => "Consulta de Municipios del valle",
            'items'=>$this->collection,
            'meta'=>[
                'organization'=>'Municipios del Valle',
                'authors'=>'Jose David'
            ],
            'type'=>'Municipios'
           ];
    }
}
