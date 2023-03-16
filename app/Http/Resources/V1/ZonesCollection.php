<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ZonesCollection extends ResourceCollection
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
            "action" => "Consulta de zonas",
            'items'=>$this->collection,
            'meta'=>[
                'organization'=>'Zonas',
                'authors'=>'Jose David'
            ],
            'type'=>'zonas'
           ];
    }
}
