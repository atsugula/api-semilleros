<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $table = "documents";

    protected $fillable = ['contractor_id', 'name', 'path', 'status_id'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

   /* public function stateDocument(){
        return $this->hasMany(StatusDocument::class);
    }*/

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

}
