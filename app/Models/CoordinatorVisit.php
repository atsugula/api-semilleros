<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoordinatorVisit extends Model
{
    use SoftDeletes;
    protected $table = "coordinator_visits";

    protected $fillable = [
        'hour_visit',
        'date_visit',
        'observations',
        'description',
        'sports_scene',
        'beneficiary_coverage',
        'municipalitie_id',
        //  'sidewalk_id',
        'user_id',
        'discipline_id'
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function municipalities()
    {
        return $this->belongsTo(Municipality::class, 'municipalitie_id');
    }

    public function disciplines()
    {
        return $this->belongsTo(Disciplines::class, 'discipline_id');
    }

    public function monitor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* public function sidewalk()
    {
        return $this->hasMany(Sidewalk::class, 'sidewalk_id');
    }*/

    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }





    use HasFactory;
}
