<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_support extends Model
{
    use HasFactory;
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
        'revised_by',
        'status_id',
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
