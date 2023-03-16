<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ClauseResource extends JsonResource
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
			'contract_id'=>$this->contract_id,
            'clause1' => $this->clause1,
            'clause2' => $this->clause2,
            'clause3' => $this->clause3,
            'clause4' => $this->clause4,
            'clause5' => $this->clause5,
            'clause6' => $this->clause6,
            'clause7' => $this->clause7,
            'clause8' => $this->clause8,
            'clause9' => $this->clause9,
            'clause10' => $this->clause10,
            'clause11' => $this->clause11,
            'clause12' => $this->clause12,
            'clause13' => $this->clause13,
            'clause14' => $this->clause14,
            'clause15' => $this->clause15,
            'clause16' => $this->clause16,
            'clause17' => $this->clause17,
            'clause18' => $this->clause18,
            'clause19' => $this->clause19,
            'clause20' => $this->clause20,
            'clause21' => $this->clause21,
            'clause22' => $this->clause22,
            'clause23' => $this->clause23,
            'clause24' => $this->clause24,
		];
    }
}
