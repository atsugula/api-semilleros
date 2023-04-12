<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PsychologistVisitsCollection extends ResourceCollection
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
            // "count_page" =>$request->session()->get('count_page_custom_visits'),
            'success' => true,
            'action' => 'Consulta visita personalizada',
            'items' => $this->collection,
            'meta' => [
                'organization' => 'OpenCode SAS',
                'authors' => 'zarrok'
            ],
            'type' => 'custom_visits'
        ];
    }
}
