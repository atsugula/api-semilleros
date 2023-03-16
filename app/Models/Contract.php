<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $table = "contracts";

    protected $fillable = ['contractor_id', 'cap_date', 'identifier_number', 'hiring_id', 'scanning_pdf', 'transcribed_user_id', 'reviewer_user_id', 'approve_user_id', 'status', 'rejections','rejection_message'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function hiring()
    {
        return $this->hasOne(Hiring::class, 'id', 'hiring_id');
    }

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

    public function clauses()
    {
        return $this->hasOne(Clause::class, 'id');
    }

    public function transcriber()
    {
        return $this->belongsTo(User::class, 'transcribed_user_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_user_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approve_user_id');
    }
}
