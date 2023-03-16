<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClausesBaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       /* Returning the data in the format that we want. */
        return [
            "success" => true,
            "action" => "Consulta de las clausulas",
            'items' => $this->collection,
            'meta' => [
                'organization' => 'Clausulas',
                'authors' => 'Jose David'
            ],
            'type' => 'Clausulas'
        ];
    }
}
