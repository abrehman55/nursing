<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Hired;
use App\Models\HireRequest;
use App\Models\Hold;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    public function request(Request $request)
    {
        $user = Auth::guard('api')->user();
        $hireRequest = HireRequest::create([
            'user_id' => $user->id,
            'nurse_id' => $request->nurse_id,
            'job_id' => $request->job_id
        ]);
        return Api::setResponse('hireRequest', $hireRequest);
    }

    public function acceptRequest(Request $request)
    {

        $hireRequest = HireRequest::find($request->hire_request_id);
        $job = Job::find($hireRequest->job_id);
        if ($job) {
            $job->update([
                'status' => 0
            ]);
        }
        $hospital = User::find($request->user_id);

        if ($hospital->balance < $request->amount) {
            return Api::setMessage('Hospital Balance is Low');
        } else {
            $hospital->update([
                'balance' => $hospital->balance - $request->amount,
            ]);

            Hold::create([
                'user_id' => $hospital->id,
                'nurse_id' => $hireRequest->nurse_id,
                'amount' => $request->amount,
            ]);
        }

        return Api::setMessage('request accepted successfully', $hireRequest);
    }

    public function now(Request $request)
    {

        Hired::create([
            'user_id' => Auth::user()->id
        ] + $request->all());

        $job = Job::find($request->job_id);
        if ($job) {
            $job->update([
                'status' => 0
            ]);
        }
        $hospital = User::find(Auth::user()->id);

        if ($hospital->balance < $request->amount) {
            return Api::setMessage('Hospital Balance is Low');
        } else {
            $hospital->update([
                'balance' => $hospital->balance - $request->amount,
            ]);

            Hold::create([
                'user_id' => $hospital->id,
                'nurse_id' => $request->nurse_id,
                'amount' => $request->amount,
            ]);
        }

        return Api::setMessage('Nurse hired successfully');
    }

    public function complete(Request $request){

        $hold = Hold::where('user_id',$request->hospital_id)->where('nurse_id', $request->nurse_id)->first();

        $nurse = User::find($request->nurse_id);
        $nurse->update([
            'balance' =>$nurse->balance + $hold->amount,
        ]);

        $hired = Hired::where('nurse_id', $request->nurse_id)->first();

        $hired->update([
            'completed' => true,
        ]);

        $hold->delete();
        
        return Api::setMessage('Hiring Completed');

    }

    public function reject(Request $request){

        $hold = Hold::where('user_id',$request->hospital_id)->where('nurse_id', $request->nurse_id)->first();

        $hospital = User::find($request->hospital_id);

        $hospital->update([
            'balance' =>$hospital->balance + $hold->amount,
        ]);

        $hold->delete();

        return Api::setMessage('Hiring Rejected');
    }
}
