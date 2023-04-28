<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
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
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'document_number'=>$this->document_number,
            'gender' => $this->gender,
            'visits'=>$this->visits,
            'created_at'=> $this->created_at ? $this->getPublishedAtAttribute():null,
        ];
    }
}
