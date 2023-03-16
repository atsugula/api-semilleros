<?php

namespace App\Models;

use App\Models\Binnacle;
use App\Models\Nac;
use App\Models\Neighborhood;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ImageTrait;
use App\Models\Inscriptions\Attendant;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\ControlChangeData;
use App\Models\Group;

class Beneficiary extends Model
{
    use HasFactory, ImageTrait, LogsActivity;
    use SoftDeletes;

    protected $table = "beneficiaries";
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    protected $hidden = ['pivot'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function created_user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // public function health_data(){
	// 	return $this->morphOne(HealthData::class,'health_data');
	// }

    public function userbeneficiario(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    public function control_data(){
		return $this->morphMany(ControlChangeData::class,'data_model');
	}
    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id')->select('id','name');
    }
}
