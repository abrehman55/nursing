<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      
        $credentials =  Validate::login($request , User::class);

  
        if(Auth::guard('user')->attempt($credentials)){
           
            $user = Auth::guard('user')->user();
            $user->category;
            return Api::setResponse('user',$user->withToken());
        }
        else{
            
            return Api::setError('Invalid');
        }
    }
}
