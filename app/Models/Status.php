<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;
    protected $table = "statuses";

    protected $fillable = ['name', 'slug'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function documents(){
        return $this->hasMany(Document::class);
    }
    use HasFactory;
}
