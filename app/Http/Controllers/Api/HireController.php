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
            'job_id' => $request->job_id,
            'amount' => $request->amount,
            'status' => true
        ]);
        return Api::setResponse('hireRequest', $hireRequest);
    }

    public function acceptRequest(Request $request)
    {

        $hireRequest = HireRequest::find($request->hire_request_id);
        $job = Job::find($hireRequest->job_id);

        $hired = Hired::create([
            'user_id' =>$hireRequest->user_id,
            'nurse_id' =>$hireRequest->nurse_id,
            'job_id' =>$hireRequest->job_id,
            'amount' =>$hireRequest->amount,
        ] + $request->all());

        if ($job) {
            $job->update([
                'status' => 0
            ]);
        }
        $hospital = User::find($hireRequest->user_id);

        if ($hospital->balance < $request->amount) {
            $response = new Api;
            $response->add('error','Hospital Balance is Low');
            $response->add('hospital',$hospital);
            return $response->json();
        } else {
            $hospital->update([
                'balance' => $hospital->balance - $request->amount,
            ]);

            $hold = Hold::create([
                'user_id' => $hospital->id,
                'nurse_id' => $hireRequest->nurse_id,
                'amount' => $hireRequest->amount,
                'hire_id' => $hired->id,
            ]);
        }

       
        $nurse = User::find($hireRequest->nurse_id);
        $response = new Api;
        $response->add('Success','Request Acepted');
        $response->add('hospital',$hospital);
        $response->add('nurse',$nurse);
        $response->add('hold',$hold);
        $response->add('hired',$hired);
        return $response->json();
    }

    public function now(Request $request)
    {

        $hired = Hired::create([
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
            $response = new Api;
            $response->add('error','Hospital Balance is Low');
            $response->add('hospital',$hospital);
            return $response->json();
        } else {
            $hospital->update([
                'balance' => $hospital->balance - $request->amount,
            ]);

            $hold = Hold::create([
                'user_id' => $hospital->id,
                'nurse_id' => $request->nurse_id,
                'amount' => $request->amount,
                'hire_id' => $hired->id,
            ]);
        }

        // return Api::setMessage('Nurse hired successfully');
        $nurse = User::find($request->nurse_id);
        $response = new Api;
        $response->add('Success','Request Acepted');
        $response->add('hospital',$hospital);
        $response->add('nurse',$nurse);
        $response->add('hold',$hold);
        $response->add('hired',$hired);
        return $response->json();
    }

    public function complete(Request $request){

        $hold = Hold::where('hire_id',$request->hire_id)->first();

        $nurse = User::find($hold->nurse_id);
        $nurse->update([
            'balance' =>$nurse->balance + $hold->amount,
        ]);

        $hired = Hired::find($request->hire_id);

        $hired->update([
            'completed' => true,
        ]);

        $hold->delete();
        
        // return Api::setMessage('Hiring Completed');

        $hospital = User::find($hold->hospital_id);
        $response = new Api;
        $response->add('Success','Request Acepted');
        $response->add('hospital',$hospital);
        $response->add('nurse',$nurse);
        return $response->json();

    }

    public function reject(Request $request){

        $hold = Hold::where('hire_id',$request->hire_id)->first();
      

        $hospital = User::find($hold->user_id);
        // dd($hospital);
        $nurse = User::find($hold->nurse_id);

        $hospital->update([
            'balance' =>$hospital->balance + $hold->amount,
        ]);

        $hold->delete();

        // return Api::setMessage('Hiring Rejected');
        $response = new Api;
        $response->add('Success','Request Acepted');
        $response->add('hospital',$hospital);
        $response->add('nurse',$nurse);
        return $response->json();
    }
    
    public function RejectHireRequest(Request $request){
        $hireRequest = HireRequest::find($request->hire_request_id);

        $hireRequest->update([
            'status' => false
        ]);
        $response = new Api;
        $response->add('Rejected','Hire Request Rejected by Nurse');
        $response->add('hire request',$hireRequest);
        return $response->json();
    }
}
