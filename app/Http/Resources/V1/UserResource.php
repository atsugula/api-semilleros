<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'document_number'=>$this->document_number,
            'email'=>$this->email,
            'roles' => $this->roles,
            'status'=>$this->status,
            'created_at'=> $this->created_at ? $this->getPublishedAtAttribute():null,
            'profile'=>$this->profile,
            'metodologo'=> $this->metodologoUser,
            'inactive'=>$this->inactive,

        ];
    }
}
