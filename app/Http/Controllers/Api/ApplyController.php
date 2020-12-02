<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\ApplyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function apply(Request $request){
        $nurse = Auth::guard('api')->user();

        ApplyRequest::create([
            'nurse_id' => $nurse->id,
            'user_id' => $request->user_id,
            'job_id' => $request->job_id
        ]);
        return Api::setMessage('successfully applied');
    }
}
