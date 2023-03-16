<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Token\Stack;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusDocument extends Model
{
    use SoftDeletes;
    protected $table = "status_documents";

    protected $fillable = ['document_id', 'status_id', 'description'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

   /*public function state(){
        return $this->belongsTo(Status::class, 'status_id');
    }*/
}
