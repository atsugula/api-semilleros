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
            'discipline_id' => $this->discipline_id,
            'municipality_id' => $this->municipality_id,
            'monitor_id' => $this->monitor_id,
            'status_id' => $this->status_id,
            'reject_message' => $this->reject_message,
            'sport_scene' => $this->sports_scene,
            'sidewalk' => $this->sidewalk,
            // Relaciones
            'discipline' => $this->disciplines,
            'monitor' => $this->monitor,
            'created_by' => $this->creator,
            'reviewed_by' => $this->reviewed,
            'status' => $this->statuses,
            'municipality' => $this->municipalities,
            'monitor_name' => $this->monitor?->name,
        ];
    }
}
