<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id'=>$this->id,
            'correct'=>$this->correct,
            'date_visit'=>$this->date_visit,
            'hour_visit'=>$this->hour_visit,
            'event'=>$this->event,
			'created_at'=>$this->created_at
        ];
    }
}
