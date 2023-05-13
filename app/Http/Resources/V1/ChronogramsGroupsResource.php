<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ChronogramsGroupsResource extends JsonResource
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
            'chronograms_id' => $this->chronograms_id,
            'group' => $this->group,
            'sports_modality' => $this->sports_modality,
            'main_sports_stage_name' => $this->main_sports_stage_name,
            'main_sports_stage_address' => $this->main_sports_stage_address,
            'alt_sports_stage_name' => $this->alt_sports_stage_name,
            'alt_sports_stage_address' => $this->alt_sports_stage_address,
            'schedules' => $this->schedules,
        ];
    }
}
