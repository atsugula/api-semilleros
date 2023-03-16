<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecificcontratoractivityCollection extends ResourceCollection
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
            "action" => "Consulta de Actividades Especificas del contratista para el contrato",
            'items' => $this->collection,
            'meta' => [
                'organization' => 'Contract',
                'authors' => 'Robison Ñañez Vivas'
            ],
            'type' => 'Contract'
        ];
    }
}
