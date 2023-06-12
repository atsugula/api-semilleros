<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrative extends Model
{
    use HasFactory;

    protected $table = 'administratives';

    protected $fillable = 
    [
        'id',
        'user_id',
        'region_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function regions()
    {
        return $this->belongsTo(Zone::class, 'region_id');
    }
}
