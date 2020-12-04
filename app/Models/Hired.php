<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hired extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'apply_request_id',
        'nurse_id',
    ];
}
