<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZoneUser extends Model
{
    use SoftDeletes;
    protected $table = "zone_users";

    protected $fillable = ['user_id', 'zones_id'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class, 'zones_id');
    }

    public function municipalities(){
        return $this->hasMany(Municipality::class, 'zone_id');
    }

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

}
