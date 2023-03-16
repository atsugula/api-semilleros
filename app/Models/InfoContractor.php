<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoContractor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "info_contractors";

    protected $fillable = [
        'contractor_id',
        'pension',
        'arl',
        'eps',
        'history',
        'activities',
        'experience_profile',
        'contractual_object',
        'start_date',
        'final_date',
        'mobilizations_value',
        'mobilizations_transport',
        'quota_without_mobilization',
        'number_share',
        'contract_value',
        'payroll',
        'budget_allocation',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }
}
