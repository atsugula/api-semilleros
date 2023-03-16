<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContractorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* Returning the data in a specific format. */
        return [
            "success" => true,
            "action" => "Consulta Contratista",
            'items' => $this->collection,
            'meta' => [
                'organization' => 'Contractor',
                'authors' => 'Jose David'
            ],
            'type' => 'Contractor'
        ];
    }
}
