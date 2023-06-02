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
            'registration_date'=> $this->registration_date,
            'affiliation_type'=> $this->affiliation_type,
            'created_by' => $this->created_user,
            'group_id' => $this->group,
            'full_name' => $this->full_name,
            'institution' => $this->institution,
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
            'municipality'  => $this->municipality,
            'audited' => $this->audited,
            'rejection_message' => $this->rejection_message,
            'referrer_name' => $this->referrer_name,
            'created_at' => $this->created_at,

            'disciplines_id' => $this->disciplines_id,
            'birth_date' => $this->birth_date,
            'origin_place' => $this->origin_place,
            'home_address' => $this->home_address,
            'conflict_victim' => $this->conflict_victim,
            'distric' => $this->distric,
            'gender' => $this->gender,
            'ethnicities_id' => $this->ethnicities_id,
            'disability' => $this->disability,
            'other_disability' => $this->other_disability,
            'pathology' => $this->pathology,
            'what_pathology' => $this->what_pathology,
            'blood_type' => $this->blood_type,
            'live_with' => $this->live_with,
            'scholarship' => $this->scholarship,
            'scholar_level' => $this->scholar_level,
            'health_entity_id' => $this->health_entity_id,

            'know_guardian' => isset($this->acudientes) ? $this->acudientes : '',
            'acudiente' => isset($this->acudientes[0]->guardian) ? $this->acudientes[0]->guardian : '',
            'tamizaje' => $this->tamizaje,
            'status_id' => $this->status_id,
            'reviewed_by' => $this->reviewed_user,
            'approved_by' => $this->approved_user,
            'rejected_by' => $this->rejected_user,
            'rejection_message' => $this->rejection_message,
        ];
    }
}
