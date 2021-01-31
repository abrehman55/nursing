<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\StripeKey;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function getkey(){

        $stripe = StripeKey::find(1);
        
        return Api::setResponse('keys', $stripe);

    }
}
