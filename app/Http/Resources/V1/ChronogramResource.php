<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ChronogramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           // 'id' => $this->id,
            //'month' => $this->mes->name,
           // 'municipio' => $this->municipio->name,
           // 'note' => $this->note,
           // 'groups' => $this->groups,
            //'status' => $this->statuses,
            'reviewed' => [
                'user' => $this->reviewed,
                'roles' => $this->reviewed?->roles,
            ],
            'created_by' => $this->creator,
            'created_at'=> $this->created_at ? $this->getPublishedAtAttribute():null,
        ];
    }
}
