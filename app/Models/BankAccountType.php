<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccountType extends Model
{
    protected $table = "bank_account_types";

    protected $fillable = ['name'];
    protected $guarded = [
        'created_at', 'updated_at'
    ];
    use HasFactory, SoftDeletes;
}
