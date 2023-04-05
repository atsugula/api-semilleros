<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowGuardians extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_guardian',
        'id_beneficiary',
        'know_needs',
        'concept',
    ];

    protected $casts = [
        'know_needs' => 'boolean',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'id_guardian');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'id_beneficiary');
    }
}
