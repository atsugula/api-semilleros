<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChronogramCollection extends ResourceCollection
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
            'success' => true,
            'action' => 'Consulta cronogramas',
            'items' => $this->collection,
            'meta' => [
                'organization' => 'OpenCode',
                'authors' => 'Jonathan Londoño'
            ],
            'type' => 'cronogramas'

        ];
    }
}
