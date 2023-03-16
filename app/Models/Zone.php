<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = "zones";

    protected $fillable = ['name'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
