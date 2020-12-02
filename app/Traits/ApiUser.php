<?php

namespace App\Traits;

use App\Helpers\FileHelper;
use App\Helpers\ImageHelper;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

trait ApiUser {

    public static function registerRules()
    {
        return [
            'name'=>'max:255|required',
            'email'=>'email|required|unique:users',
            'password' => 'min:6|required',
        ];
    }
    
    public static function loginRules()
    {
        return [
            'email'=>'email|required',
            'password' => 'required'
        ];
    }

    public function setImageAttribute($value){
        if(is_file($value)){
            $this->attributes['image'] = ImageHelper::saveImage($value,'images/users');
        } else if (!empty($value)){
            $this->attributes['image'] = $value;
        }
    }
    
    public function getImageAttribute($value){
        return asset($value);
    }

    public function setPasswordAttribute($value){
        if(!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function withToken(){
        $this->posts_count = $this->posts->count();
        $this->friends_count = $this->friends->count();
        unset($this->posts);
        unset($this->friends);

        return $this->makeVisible(['api_token']);
    }

    public function isActive(){
        return $this->status == 'Active';
    }
    
    public function block(){
        $this->status = 'Blcoked';
        $this->save();
    }
    
    public function unBlock(){
        $this->status = 'Active';
        $this->save();
    }
    
}