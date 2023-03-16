<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Validity_period extends Model
{
    use SoftDeletes;
    use HasFactory, LogsActivity;

    protected $table = "validity_periods";

    protected $fillable = [
        'consecutive',
        'term',
        'start_date',
        'final_date',
        'cap_date',
        'cap',
        'cap_certificate',
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
