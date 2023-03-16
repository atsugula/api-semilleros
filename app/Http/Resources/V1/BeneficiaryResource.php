<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BeneficiaryResource extends JsonResource
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
            'affiliation_type'=> $this->affiliation_type,
            'created_by' => $this->created_user,
            'group_id' => $this->group,
            'full_name' => $this->full_name,
            'institution_entity_referred' => $this->institution_entity_referred,
            'accept' => $this->accept,
            'linkage_project' => $this->linkage_project,
            'participant_type' => $this->participant_type,
            'type_document' => $this->type_document,
            'document_number' => $this->document_number,
            'zone' => $this->zone,
            'stratum' => $this->stratum,
            'phone' => $this->phone,
            'email' => $this->email,
            'file' => $this->file,
            'status' => $this->status,
            'audited' => $this->audited,
            'rejection_message' => $this->rejection_message,
            'referrer_name' => $this->referrer_name,
            'created_at' => $this->created_at
        ];
    }
}
