<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'user_id','spec_name','exp'
    ];
  
}
