<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    protected $fillable = [
        'user_id','nurse_id','job_id','amount','status'
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
