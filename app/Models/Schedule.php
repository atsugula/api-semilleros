<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class Schedule extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    protected $table = "schedules";

    protected $fillable = [
        'chronograms_groups_id',
        'day',
        'start_time',
        'end_time',
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

    public function chonogram_group(){
        return $this->hasOne(ChonogramsGroups::class, 'id', 'chronograms_groups_id');
    }
}
