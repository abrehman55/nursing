<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyRequest extends Model
{
    protected $fillable = [
        'user_id','job_id','nurse_id'
    ];

    public function nurse(){
        return $this->belongsTo(User::class, 'nurse_id');
    }
}
