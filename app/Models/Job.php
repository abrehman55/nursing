<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
   protected $fillable = [
       'user_id','title','pay','hours','description','status'
   ];


   public function user(){
       return $this->belongsTo(User::class);
   }
}
