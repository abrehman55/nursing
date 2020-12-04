<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{

    protected $appends = [
        'applied'
    ];

   protected $fillable = [
       'user_id','title','pay','hours','description','status'
   ];

   public function user(){
       return $this->belongsTo(User::class);
   }

   public function applicants(){
       return $this->hasMany(ApplyRequest::class)->with('');
   }

   public function getAppliedAttribute(){
        if(ApplyRequest::where('nurse_id',Auth::user()->id)->where('job_id', $this->id)->first())
            return true;
        else
            return false;
   }
}
