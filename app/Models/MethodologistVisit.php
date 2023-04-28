<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class MethodologistVisit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "methodologist_visits";

    protected $fillable = [
        'hour_visit',
        'date_visit',
        'sports_scene',
        'beneficiary_coverage',
        'lesson_plan',
        'congruent_activity',
        'develop_technical_sports_component_month',
        'management_development_activities',
        'functional_component_month',
        'puntuality',
        'personal_presentation',
        'patient',
        'discipline',
        'parent_child_communication',
        'verbalization',
        'traditional',
        'behavioral',
        'romantic',
        'constructivist',
        'globalizer',
        'municipality_id',
        'sidewalk_id',
        'created_by',
        'discipline_id',
        'evaluation_id',
        'event_support_id',
        'observations',
        'revised_by',
        'monitor_id',
        'rejection_message',
        'status_id'
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function municipalities(){
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function event_supports(){
        return $this->belongsTo(Event_support::class, 'event_support_id');
    }

    public function evaluations(){
        return $this->belongsTo(Evaluation::class, 'evaluation_id');
    }

    public function disciplines(){
        return $this->belongsTo(Disciplines::class, 'discipline_id');
    }

    public function sidewalk(){
        return $this->belongsTo(Sidewalk::class, 'sidewalk_id');
    }

    public function monitor(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getPublishedAtAttribute(){
        return $this->created_at->format('Y-m-d');
    }

    public function control_data(){
		return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function files(){
        return $this->hasMany(DocumentVisit::class, 'visit_id')->where('type', 'methodologist_visits');
    }

}
