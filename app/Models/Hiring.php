<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hiring extends Model
{
    protected $table = "hirings";

    protected $fillable = ['contracting_entity', 'nit', 'address', 'city', 'manager_user_id'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function usersManager()
    {
        return $this->belongsTo(User::class, 'manager_user_id');
    }

    use SoftDeletes, HasFactory;
}
