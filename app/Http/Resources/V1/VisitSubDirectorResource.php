<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitSubDirectorResource extends JsonResource
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
            'date_visit' => $this->date_visit,
            'hour_visit' => $this->hour_visit,
            'sports_scene' => $this->sports_scene,
            'beneficiary_coverage' => $this->beneficiary_coverage,
            'technical' => $this->technical,
            'event_support' => $this->event_support,
            'description' => $this->description,
            'observations' => $this->observations,
            'file' => $this->file,
            'municipality_id' => $this->municipalities,
            'transversal_activity' => $this->transversal_activity,
            // 'sidewalk_id' => $this->sidewalks,
            'discipline_id' => $this->disciplines,
            'monitor_id' => $this->monitor,
            'created_by' => $this->creator,
            'reviewed_by' => $this->reviewed,
            'status_id' => $this->statuses,
            'reject_message' => $this->reject_message,
            'municipality' => $this->municipalities->name,
            'monitor_name' => $this->monitor->name,
            'sport_scene' => $this->sports_scene,
        ];
    }
}
