<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class PsychologistVisitsResource extends JsonResource
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
            'create_by' => $this->create_by,
            'reviewed_by' => $this->reviewed_by,
            'scenery' => $this->scenery,
            'number_beneficiaries' => $this->number_beneficiaries,
            'beneficiaries_recognize_name' => $this->beneficiaries_recognize_name,
            'beneficiary_recognize_value' => $this->beneficiary_recognize_value,
            'all_ok' => $this->all_ok,
            'evidence' => $this->evidence,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rejection_message' => $this->rejection_message,
            'date_visit' => $this->date_visit,
            //llaves foraneas
            'municipalities_id' => $this->municipalities_id,
            'diciplines_id' => $this->diciplines_id,
            'monitor_id' => $this->monitor_id,
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
