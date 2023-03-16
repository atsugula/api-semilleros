<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'account_number' => $this->account_number,
            'address' => $this->address,
            'bank_account_type_id' => $this->bank_account_type,
            'bank_account_type' => $this->account_type,
            'bank_id' => $this->bank,
            'bank' => $this->bank_data,
            'birth_date' => $this->birth_date,
            'business_name' => $this->business_name,
            'consecutive' => $this->consecutive,
            'contract' => $this->contract,
            'contract_value' => $this->contract_value,
            'date_expedition_document' => $this->date_expedition_document,
            'department_id' => $this->department,
            'department' => $this->department_data,
            'email' => $this->email,
            'identification_type' => $this->identification_type,
            'identification' => $this->identification,
            'lastname' => $this->lastname,
            'municipality_id' => $this->municipality,
            'municipality' => $this->municipality_data,
            'name' => $this->name,
            'nit' => $this->nit,
            'number_share' => $this->number_share,
            'phone' => $this->phone,
            'reject_note' => $this->reject_note,
            'status' => $this->status,
            'validity_periods_id' => $this->validity_periods_id,
        ];
    }
}
