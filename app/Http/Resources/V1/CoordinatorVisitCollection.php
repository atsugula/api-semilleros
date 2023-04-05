<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CoordinatorVisitCollection extends ResourceCollection
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
            "count_page" =>$request->session()->get('count_page_visitCoordinators'),
            'success' => true,
            'action' => 'Consulta visita coordinadores',
            'items' => $this->collection,
            'meta' => [
                'organization' => 'OpenCode SAS',
                'authors' => 'Jorge Usuga'
            ],
            'type' => 'coordinator_visit'
        ];
    }
}
