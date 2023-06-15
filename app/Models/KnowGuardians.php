<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowGuardians extends Model
{
    use HasFactory;
    protected $table = "know_guardians";
    protected $fillable = [
        'id_guardian',
        'id_beneficiary',
        'relationship',
        'find_out',
        'social_media',
    ];

    protected $casts = [
        'know_needs' => 'boolean',
    ];

    public function guardian()
    {
        return $this->belongsTo(BeneficiaryGuardians::class, 'id_guardian');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'id_beneficiary');
    }
}
