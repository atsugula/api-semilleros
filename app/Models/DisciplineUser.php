<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisciplineUser extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "discipline_users";

    protected $fillable = [
        'user_id',
        'disciplines_id'
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function users(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function Dciplines(){
        return $this->hasMany(Disciplines::class, 'id', 'disciplines_id');
    }
}
