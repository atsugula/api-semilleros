<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClauseCollection extends ResourceCollection
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
            "action" => "Consulta de clausulas con su respectivo contrato",
            'items'=>$this->collection,
            'meta'=>[
                'organization'=>'Clausulas de contrato',
                'authors'=>'Jose Diaz'
            ],
            'type'=>'Clausulas amarradas a un contrato'
           ];
    }
}
