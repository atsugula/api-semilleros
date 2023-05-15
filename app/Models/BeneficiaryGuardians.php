<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Beneficiary;

class BeneficiaryGuardians extends Model
{
    use HasFactory; //, SoftDeletes;

    protected $table = "beneficiary_guardians";
    protected $fillable = [
        "cedula", "firts_name", "last_name", "email", "phone_number"
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->firts_name} {$this->last_name}";
    }

    public function beneficiaries(){
        return $this->hasMany(KnowGuardians::class, 'id_guardian');
    }

}
