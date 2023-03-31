<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CoordinatorVisitResource extends JsonResource
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
            'hour_visit' => $this->hour_visit,
            'date_visit' => $this->date_visit,
            'observations' => $this->observations,
            'description' => $this->description,
            'file' => $this->file,
            'sports_scene' => $this->sports_scene,
            'beneficiary_coverage' => $this->beneficiary_coverage,
            'reject_message' => $this->rejection_message,
            'created_at' => $this->created_at?->format('Y-m-d'),
            // Relaciones
            'municipalitie' => $this->municipalities,
            'monitor' => $this->monitor,
            'discipline' => $this->disciplines,
            'created_by' => $this->createdBy,
            'revised_by' => $this->revisedBy,
            'status' => $this->statuses,
            // Campos sin relaciones
            'municipalitie_id '=>  $this->municipalitie_id,
            'user_id' => $this->user_id,
            'discipline_id' => $this->discipline_id,
            'status_id' => $this->status_id,
        ];
    }
}
