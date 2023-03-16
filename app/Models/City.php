<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    protected $fillable = ['name'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class);
    }

    use HasFactory;
}
