<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Hired;
use App\Models\HireRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    public function request(Request $request){
        $user = Auth::guard('api')->user();
        $hireRequest = HireRequest::create([
            'user_id' => $user->id,
            'nurse_id' => $request->nurse_id,
            'job_id' => $request->job_id
        ]);
        return Api::setResponse('hireRequest', $hireRequest);
    }
    
    public function acceptRequest(Request $request){
        
        $hireRequest = HireRequest::find($request->hire_request_id);
        $job = Job::find($hireRequest->job_id);
        if($job){
            $job->update([
                'status' => 0
            ]);
        }
        
        return Api::setMessage('request accepted successfully', $hireRequest);
    }

    
    public function now(Request $request){

        Hired::create([
            'user_id' => Auth::user()->id   
        ]+$request->all());

        $job = Job::find($request->job_id);
        if($job){
            $job->update([
                'status' => 0
            ]);
        }

        return Api::setMessage('Nurse hired successfully');
    }
}
