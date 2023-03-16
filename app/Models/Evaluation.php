<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "evaluations";

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
