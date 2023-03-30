<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class ChronogramsGroups extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    protected $table = "chronograms_groups";

    protected $fillable = [
        'chronograms_id',
        'group_id',
        'sports_modality',
        'main_sports_stage_name',
        'main_sports_stage_address',
        'alt_sports_stage_name',
        'alt_sports_stage_address',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function control_data(){
        return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function getPublishedAtAttribute(){
        return $this->created_at->format('Y-m-d');
    }

    public function chonogram(){
        return $this->hasOne(Chonogram::class, 'id', 'chronograms_id');
    }

    public function group(){
        return $this->hasOne(Groups::class, 'id', 'groups_id');
    }

    public function discipline(){
        return $this->hasOne(Disciplines::class, 'id', 'disciplines_id');
    }

    public function schedules(){
        return $this->hasMany(Schedule::class, 'chronograms_groups_id');
    }
    
}
