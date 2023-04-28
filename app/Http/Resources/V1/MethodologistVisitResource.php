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
            'lesson_plan' => $this->lesson_plan,
            'congruent_activity' => $this->congruent_activity,
            'develop_technical_sports_component_month' => $this->develop_technical_sports_component_month,
            'management_development_activities' => $this->management_development_activities,
            'functional_component_month' => $this->functional_component_month,
            'puntuality' => $this->puntuality,
            'personal_presentation' => $this->personal_presentation,
            'patient' => $this->patient,
            'discipline' => $this->discipline,
            'parent_child_communication' => $this->parent_child_communication,
            'verbalization' => $this->verbalization,
            'traditional' => $this->traditional,
            'behavioral' => $this->behavioral,
            'romantic' => $this->romantic,
            'constructivist' => $this->constructivist,
            'globalizer' => $this->globalizer,
            'observations' => $this->observations,
            'files' => $this->files,
            'municipalities' => $this->municipalities,
            'event_supports' => $this->event_supports,
            'evaluations' => $this->evaluations,
            'disciplines' => $this->disciplines,
            'monitor' => $this->monitor,
            'sidewalk' => $this->sidewalk,
            'status' => $this-> status,
            'sidewalk_name' => $this->sidewalk->name,
            'sidewalk' => $this->sidewalk,
            'methodologist' => $this->created_by_user
        ];
    }
}
