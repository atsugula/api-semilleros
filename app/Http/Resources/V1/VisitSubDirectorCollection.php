<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VisitSubDirectorCollection extends ResourceCollection
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
            // "count_page" =>$request->session()->get('count_page_visitSubDirectors'),
            'success' => true,
            'action' => 'Consulta visita subdirector',
            'items' => $this->collection,
            'meta' => [
                'organization' => 'OpenCode SAS',
                'authors' => 'Jorge Usuga'
            ],
            'type' => 'subdirector_visit'
        ];
    }
}
