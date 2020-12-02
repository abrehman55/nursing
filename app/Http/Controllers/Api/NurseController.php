<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\Qualification;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseController extends Controller
{
    public function store(Request $request)
    {

       $credentials = Validate::register($request,Nurse::class);
       $nurse = Nurse::create($credentials);
        return Api::setResponse('nurse',$nurse->withToken());
    }

    public function update(Request $request){
         $nurse = Auth::guard('nurse-api')->user();
     
         Qualification::create([
            'nurse_id' => $nurse->id,
            'degree' => $request->degree,
            'institude' => $request->institude,
            'year' => $request->year
        ]);

         Specification::create([
            'nurse_id' => $nurse->id,
            'spec_name' => $request->spec_name,
            'exp' => $request->exp
        ]);

      
        $nurse = Auth::guard('nurse-api')->user()->with('qualifications')->with('specifications')->get();
        return Api::setResponse('nurse',$nurse);
    }

    public function get_nurse_Profile(Request $request){
        $nurse = Nurse::find($request->nurse_id);
        return Api::setResponse('nurse',$nurse);

    }
}
