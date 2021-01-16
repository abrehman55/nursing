<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function profile(){
       return view('profile');
   }
   public function update(Request $request){
       $user = Auth::guard('admin')->user();
       $user->update($request->all());
       toastr()->info('your profile was updated','Done');
       return redirect()->back();
   }
}
