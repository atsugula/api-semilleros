<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class TransversalActivityResource extends JsonResource
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
            'nro_assistants' => $this->nro_assistants,
            'activity_name' => $this->activity_name,
            'objective_activity' => $this->objective_activity,
            'scene' => $this->scene,
            'meeting_planing' => $this->meeting_planing,
            'team_socialization' => $this->team_socialization,
            'development_activity' => $this->development_activity,
            'content_network' => $this->content_network,
            'files_id' => $this->files_id,
            'municipality_id' => $this->municipality_id,
            'created_by' => $this->created_by,
            'reviewed_by' => $this->reviewed_by,
            'status_id' => $this->status_id,
            'reject_message' => $this->reject_message,
            // Relaciones
            'municipalities' => $this->municipalities,
            'creator' => $this->creator,
            'reviewed' => $this->reviewed,
            'files' => $this->files,
            'status' => $this->statuses,
        ];
    }
}
