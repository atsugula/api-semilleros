<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = "municipalities";

    protected $fillable = ['name', 'zone_id'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->hasMany(MunicipalityUser::class, 'municipalities_id');
    }

    public function MethodologistVisit(){
        return $this->belongsTo(MethodologistVisit::class);
    }

}
