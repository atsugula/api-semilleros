<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clause extends Model
{
    use SoftDeletes;

    protected $table = "clauses";

    protected $fillable = [
        'contract_id',
        'clause1',
        'clause2',
        'clause3',
        'clause4',
        'clause5',
        'clause6',
        'clause7',
        'clause8',
        'clause9',
        'clause10',
        'clause11',
        'clause12',
        'clause13',
        'clause14',
        'clause15',
        'clause16',
        'clause17',
        'clause18',
        'clause19',
        'clause20',
        'clause21',
        'clause22',
        'clause23',
        'clause24',
    ];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;
}
