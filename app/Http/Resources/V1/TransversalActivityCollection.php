<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransversalActivityCollection extends ResourceCollection
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
            // 'count_page' =>$request->session()->get('count_page_transversal_activity'),
            'success' => true,
            'action' => 'Consulta Actividad Transversal',
            'items' => $this->collection,
            'meta' => [
                'organization' => 'OpenCode SAS',
                'authors' => 'Jorge Usuga'
            ],
            'type' => 'transversal_activity'
        ];
    }
}
