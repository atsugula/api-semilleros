<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Event_support extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "event_supports";

    protected $fillable = [
        'name'
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
