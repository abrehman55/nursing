<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Traits\ApiUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, ApiUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'type',
        'genre',
        'lat',
        'long',
        'location',
        'image',
        'firebase_token',
        'cat_id',
        'license_no',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        if(!empty($value))
        $this->attributes['password'] =Hash::make($value);
    }

    public function setImageAttribute($value){
	    if(is_string($value)){
	        $this->attributes['image'] = asset(ImageHelper::saveImageFromApi($value,'assets/img/user')); 
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = asset(ImageHelper::saveImage($value,'assets/img/user')); 
	    }
}

    public static function registerRules()
    {
        return[

            'name' => 'max:255|required',
            'email' => 'email|required|unique:users',
            'password' => 'min:4|required',
        ];
    }

       public static function loginRules()
    {
        return[

            'email' => 'email|required',
            'password' => 'required'
        ];
    }

    public function withToken()
    {
        return $this->makeVisible(['api_token']);
    }

    public function favorites(){
        return $this->belongsToMany(User::class,'favorite_nurses', 'user_id', 'nurse_id');
    }
    

    public function qualifications(){
        return $this->hasMany(Qualification::class);
    }
    
    public function specifications(){
        return $this->hasMany(Specification::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function getTypeAttribute($value){
        if($value == 'user')
            return 1;
        else 
            return 2;
    }

    public function setLatAttribute($value){
        $this->attributes['location'] = $value.', ';
        $this->attributes['lat'] = $value;
    }
    
    public function setLongAttribute($value){
        $this->attributes['location'] = $this->attributes['location'].$value;
        $this->attributes['long'] = $value;
    }
    
 

}
