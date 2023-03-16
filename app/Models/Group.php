<?php

namespace App\Models;

use App\Models\Inscriptions\Beneficiary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "groups";
    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class,'group_id','id')->select('beneficiaries.id','beneficiaries.full_name','beneficiaries.document_number as nuip');
    }
}
