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
            $nurse->distance = Location::diatance($nurse->location, $user->location);
        }

        $sorted = $nurses->sort(function($a, $b) {
            if ($a->distance == $b->distance) {
                return 0;
            }
        
            return ($a->distance < $b->distance) ? 1 : -1;
        });

        return Api::setResponse('nearby_nurses', $sorted);
    }

    public function sortByDistance($a, $b)
    {
        return $a->distance - $b->distance;
    }


    
}
