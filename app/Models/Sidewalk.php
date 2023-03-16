<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sidewalk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "sidewalks";

    protected $fillable = [
        'name',
        'citie_id'
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

    public function cities(){
        return $this->belongsTo(City::class, 'citie_id');
    }

}
