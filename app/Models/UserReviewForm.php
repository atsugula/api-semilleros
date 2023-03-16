<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReviewForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_review_forms';

    protected $fillable = [
        'user_id','user_review_form_id','user_review_form_type'
    ];
    public function user_review_form(){
        return $this->morphTo();
    }
}
