<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Months extends Model
{
    use SoftDeletes;
    protected $table = "months";

    protected $fillable = ['name'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;
}
