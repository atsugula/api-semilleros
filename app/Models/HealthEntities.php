<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthEntities extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "health_entities";

    protected $fillable = ['entity'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

}
