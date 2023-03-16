<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class DocumentVisit extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    protected $table = "document_visits";

    protected $fillable = [
        'type',
        'path',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function control_data(){
        return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function getPublishedAtAttribute(){
        return $this->created_at->format('Y-m-d');
    }

}
