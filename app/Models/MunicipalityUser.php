<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalityUser extends Model
{
    use SoftDeletes;
    protected $table = "municipality_users";

    protected $fillable = ['user_id', 'municipalities_id'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }

}
