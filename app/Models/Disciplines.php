<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplines extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = "disciplines";

    protected $fillable = ['name'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function MethodologistVisit(){
        return $this->belongsTo(MethodologistVisit::class);
    }
}
