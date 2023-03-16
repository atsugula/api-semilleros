<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "contractors";

    //  protected $fillable = ['validity_periods_id','user_id', 'identification', 'identification_type', 'contract_value', 'bank', 'bank_account_type', 'account_number', 'date_expedition_document', 'birth_date', 'phone'];
    protected $fillable = [
        'account_number',
        'address',
        'bank_account_type',
        'bank',
        'birth_date',
        'business_name',
        'consecutive',
        'contract_value',
        'date_expedition_document',
        'department',
        'email',
        'identification_type',
        'identification',
        'lastname',
        'municipality',
        'name',
        'nit',
        'number_share',
        'phone',
        'reject_note',
        'status',
        'validity_periods_id',
    ];
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
    }

    public function validator_periods()
    {
        return $this->belongsTo(Validity_period::class, 'validity_periods_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department');
    }

    public function municipality(){

        return $this->belongsTo(City::class, 'municipality');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status');
    }


    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'contractor_id');
    }

    public function account_type()
    {
        return $this->belongsTo(BankAccountType::class, 'bank_account_type');
    }

    public function bank_data() {
        return $this->belongsTo(Bank::class, 'bank');
    }

    public function department_data() {
        return $this->belongsTo(Department::class, 'department');
    }

    public function municipality_data() {
        return $this->belongsTo(Municipality::class, 'municipality');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'contractor_id');
    }

    public function infoContractor()
    {
        return $this->hasMany(InfoContractor::class, 'contractor_id');
    }

    /* public function documentst()
    {
        return $this->hasMany(StatusDocument::class, 'contractor_id');
    }*/
}
