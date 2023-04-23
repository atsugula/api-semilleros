<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class NavigationHistoryResource extends JsonResource
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
			'id'        => $this->id,
			'url'       => $this->url,
			'name'      => $this->name,
			'lastname'  => $this->lastname,
			'lastname'  => $this->lastname,
            'created_at' => $this->created_at?->format('Y-m-d'),
		];
    }
}
