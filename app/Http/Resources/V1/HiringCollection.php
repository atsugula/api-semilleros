<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HiringCollection extends ResourceCollection
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
            "action" => "Consulta Contratante",
            'items' => $this->collection,
            'meta' => [
                'organization' => 'Hiring',
                'authors' => 'Jose David'
            ],
            'type' => 'hiring'
        ];
    }
}
