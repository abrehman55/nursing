<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\HireRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    public function request(Request $request){
        $user = Auth::guard('api')->user();
        HireRequest::create([
            'user_id' => $user->id,
            'nurse_id' => $request->nurse_id,
            'job_id' => $request->job_id
        ]);
        return Api::setMessage('Request Sent Successfully');
    }
}
