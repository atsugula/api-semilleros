<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class NavigationHistory extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = "navigation_history";

    protected $fillable = [
        'url',
        'user_id',
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
