<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    protected $table = "municipalities";

    protected $fillable = ['description', 'state', 'region_id'];

}
