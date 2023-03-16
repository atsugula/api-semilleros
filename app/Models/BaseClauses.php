<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseClauses extends Model
{
    use SoftDeletes;

    protected $table = "base_clauses";

    protected $fillable = ['name', 'description'];
    protected $guarded = [
          'created_at', 'updated_at'
      ];
    use HasFactory;
}
