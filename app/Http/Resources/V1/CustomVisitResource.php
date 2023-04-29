<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomVisitResource extends JsonResource
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
            'theme' => $this->theme,
            'agreements' => $this->agreements,
            'concept' => $this->concept,
            'guardian_knows_semilleros' => $this->guardian_knows_semilleros,
            'file' => $this->file,
            'month_id' => $this->month_id,
            'municipality_id' => $this->municipality_id,
            'beneficiary_id' => $this->beneficiary_id,
            'created_by' => $this->created_by,
            'reviewed_by' => $this->reviewed_by,
            'status_id' => $this->status_id,
            'reject_message' => $this->reject_message,
            'created_at' => $this->created_at?->format('Y-m-d'),
            // Relaciones
            'months' => $this->months,
            'municipalities' => $this->municipalities,
            'beneficiaries' => $this->beneficiaries,
            'guardian' => $this->beneficiaries->acudientes[0]->guardian,
            'createdBy' => $this->createdBy,
            'revisedBy' => $this->revisedBy,
            'status' => $this->statuses,
    
        ];
    }
}
