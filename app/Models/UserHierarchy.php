<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHierarchy extends Model
{
    use SoftDeletes;
    protected $table = "user_hierarchies";

    protected $fillable = [
        'user_id',
        'chief_id'
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];
    use HasFactory;
}
