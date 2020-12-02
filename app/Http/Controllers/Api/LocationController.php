<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\Location;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function nearby(Request $request){
        $user = Auth::guard('api')->user();
        $nurses = User::where('genre','2')->get();
        
        foreach($nurses as $nurse){
            try{
                $nurse->distance = Location::diatance($nurse->location, $user->location);
            } catch(Exception $e){
                return Api::setError('Please update your location');
            }
        }

        $nurses->sortBy('distance');

        return Api::setResponse('nearby_nurses', $nurses);
    }
}
