<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EvidenceFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "evidence_files";

    protected $fillable = [
        'model',
        'path',
        'transversal_id',
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function creator(){
        return $this->belongsTo(TransversalActivity::class, 'transversal_id', 'id');
    }

}
