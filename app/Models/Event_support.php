<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Event_support extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "event_support";

    protected $fillable = [
        'date_visit',
        'hour_visit',
        'municipalitie_id',
        'correct',
        'event',
        'observation',
        'file1',
        'file2',
        'file3',
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function control_data(){
		return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function MethodologistVisit(){
        return $this->belongsTo(MethodologistVisit::class);
    }

}
