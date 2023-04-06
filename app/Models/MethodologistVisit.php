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
        'swich_plans_r',
        'swich_plans_sc_1',
        'swich_plans_sc_2',
        'swich_plans_sc_3',
        'swich_plans_sc_4',
        'swich_plans_gm_1',
        'swich_plans_gm_2',
        'swich_plans_gm_3',
        'swich_plans_gm_4',
        'swich_plans_gm_5',
        'swich_plans_gm_6',
        'swich_plans_mp_1',
        'swich_plans_mp_2',
        'swich_plans_mp_3',
        'swich_plans_mp_4',
        'swich_plans_mp_5',
        'municipalitie_id',
        'sidewalk_id',
        'user_id',
        'discipline_id',
        'evaluation_id',
        'event_support_id',
        'observations',
        'status_id'
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function municipalities(){
        return $this->belongsTo(Municipality::class, 'municipalitie_id');
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

    public function monitor(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sidewalk(){
        return $this->belongsTo(Sidewalk::class, 'sidewalk_id');
    }

    public function status(){
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
