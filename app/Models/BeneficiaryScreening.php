<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Beneficiary;

class BeneficiaryScreening extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "beneficiary_screening";
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function beneficiary(){
        return $this->hasOne(Beneficiary::class, 'id', 'beneficiary_id');
    }

}
