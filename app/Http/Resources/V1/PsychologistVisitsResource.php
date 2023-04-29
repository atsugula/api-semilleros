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
            'created_by' => $this->created_by,
            'reviewed_by' => $this->reviewed_by,
            'scenery' => $this->scenery,
            'objetive' => $this->objetive,
            'number_beneficiaries' => $this->number_beneficiaries,
            'beneficiaries_knows_project' => $this->beneficiaries_recognize_name,
            'beneficiaries_knows_monthly_value' => $this->beneficiary_recognize_value,
            'monitor_organization_discipline_management' => $this->all_ok,
            'file' => $this->evidence,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'regection_message' => $this->regection_message,
            'date_visit' => $this->date_visit,
            //llaves foraneas
            'municipalities_id' => $this->municipalities_id,
            'diciplines_id' => $this->diciplines_id,
            'monitor_id' => $this->monitor_id,
            // Relaciones
            'discipline' => $this->discipline,
            'monitor' => $this->monitor,
            'createdBY' => $this->createdBY,
            'reviewed_by' => $this->reviewed,
            'status' => $this->statuses,
            'municipality' => $this->municipalities,
        ];
    }
}
