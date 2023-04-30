<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MethodologistVisitResource extends JsonResource
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
            'sports_scene' => $this->sports_scene,
            'beneficiary_coverage' => $this->beneficiary_coverage,
            'swich_plans_r' => $this->swich_plans_r,
            'swich_plans_sc_1' => $this->swich_plans_sc_1,
            'swich_plans_sc_2' => $this->swich_plans_sc_2,
            'swich_plans_sc_3' => $this->swich_plans_sc_3,
            'swich_plans_sc_4' => $this->swich_plans_sc_4,
            'swich_plans_gm_1' => $this->swich_plans_gm_1,
            'swich_plans_gm_2' => $this->swich_plans_gm_2,
            'swich_plans_gm_3' => $this->swich_plans_gm_3,
            'swich_plans_gm_4' => $this->swich_plans_gm_4,
            'swich_plans_gm_5' => $this->swich_plans_gm_5,
            'swich_plans_gm_6' => $this->swich_plans_gm_6,
            'swich_plans_mp_1' => $this->swich_plans_mp_1,
            'swich_plans_mp_2' => $this->swich_plans_mp_2,
            'swich_plans_mp_3' => $this->swich_plans_mp_3,
            'swich_plans_mp_4' => $this->swich_plans_mp_4,
            'swich_plans_mp_5' => $this->swich_plans_mp_5,
            'observations' => $this->observations,
            'file' => $this->file,
            'municipalities' => $this->municipalities,
            'event_supports' => $this->event_supports,
            'evaluations' => $this->evaluations,
            'disciplines' => $this->disciplines,
            'monitor' => $this->monitor,
            'sidewalk' => $this->sidewalk,
            'status' => $this-> status,
            'created_by' => $this->created_by,
            'creator' => $this->creator
        ];
    }
}
