<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteNurse extends Model
{
    protected $fillable = [
       'user_id','nurse_id'
   ];

   public function nurse(){
    return $this->belongsTo(User::class,'nurse_id');
}
}
