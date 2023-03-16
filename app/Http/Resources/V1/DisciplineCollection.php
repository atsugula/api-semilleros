<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DisciplineCollection extends ResourceCollection
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
            "action" => "Consulta de  disciplinas deportivas",
            'items'=>$this->collection,
            'meta'=>[
                'organization'=>'Disciplinas',
                'authors'=>'Jose David'
            ],
            'type'=>'disciplinas'
           ];
    }
}
