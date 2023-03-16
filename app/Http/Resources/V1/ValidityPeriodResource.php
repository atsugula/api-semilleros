<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ValidityPeriodResource extends JsonResource
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
            'id' => $this->id,
            'consecutive' => $this->consecutive,
            'term' => $this->term,
            'start_date' => $this->start_date,
            'final_date' => $this->final_date,
            'cap_date' => $this->cap_date,
            'cap' => $this->cap,
            'cap_certificate' => $this->cap_certificate,
            'created_at'=> $this->created_at ? $this->getPublishedAtAttribute():null,
        ];
    }
}
