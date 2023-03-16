<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class Chronogram extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    protected $table = "chronograms";

    protected $fillable = [
        'month',
        'municipio',
        'note',
        'groups',
        'sport_modality',
        'sports_venue_main_name',
        'sports_venue_main_address',
        'sports_venue_alter_name',
        'sports_venue_alter_address',
        'day',
        'hour_start',
        'hour_end',
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
}
