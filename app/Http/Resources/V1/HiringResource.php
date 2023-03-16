<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class HiringResource extends JsonResource
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
            'contracting_entity'=>$this->contracting_entity,
            'nit'=>$this->nit,
            'address'=>$this->address,
            'city'=>$this->city,
           // 'manager'=>$this->manager,
            //'transcribed'=>$this->transcribed,
            //'revised'=>$this->revised,
           // 'approve'=>$this->approve,
        ];
    }
}
