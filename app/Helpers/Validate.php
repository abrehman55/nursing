<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Validate {

    public static function login($request, $model){

        $validator = Validator::make($request->all(),$model::loginRules());
        
        if($validator->fails())
            throw new HttpResponseException(Api::failed($validator));
        else
            return[
                'email' => $request->email,
                'password' => $request->password
            ];
    }
    
    public static function register($request, $model){

        $validator = Validator::make($request->all(),$model::registerRules());
        
        if($validator->fails()){
            throw new HttpResponseException(Api::failed($validator));
        }
        else{     
            return [
                'code' => rand(111111,999999),
                'api_token' => Str::random(60),
                'location' => $request->lat.', '.$request->long,
            ] + $request->all();
        }
          
    }

}