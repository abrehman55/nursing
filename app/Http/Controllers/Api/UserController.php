<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\MailHelper;
use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FavoriteNurse;
use App\Models\NurseRating;
use App\Models\Qualification;
use App\Models\Specification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $credentials = Validate::register($request, User::class);
        $user = User::create($credentials);

        if ($request->qualifications) {
            foreach ($user->qualifications as $item) {
                $item->delete();
            }
            foreach ($request->qualifications as $item) {
                Qualification::create([
                    'user_id' => $user->id,
                    'degree' => $item['degree'],
                    'institude' => $item['institude'],
                    'year' => $item['year']
                ]);
            }
        }
        

        if ($request->specifications) {
            foreach ($user->specifications as $item) {
                $item->delete();
            }
            foreach ($request->specifications as $specification) {
                Specification::create([
                    'user_id' => $user->id,
                    'spec_name' => $specification['spec_name'],
                    'exp' => $specification['exp']
                ]);
            }
        }

        $user = User::find($user->id);
        $user->qualifications;
        $user->specifications;
        $user->category;

        MailHelper::sendCode($user);
        return Api::setResponse('user', $user->withToken());
    }

    public function verify(Request $request){
        $user = User::find($request->user_id);

        if($user->code == $request->code){
            $user->verified = true;
        }
        
        $user->save();

        $user->qualifications;
        $user->specifications;
        $user->category;
        return Api::setMessage('Verified successfully','user',$user->withToken());
    }

    public function getProfile(Request $request)
    {
        $user = User::find($request->user_id);
        $user->qualifications;
        $user->specifications;
        $user->category;
        $favorites=FavoriteNurse::where('user_id',$user->id)->first();
        if($favorites){
            $user->isFavorite=true;
        }else{
            $user->isFavorite=false;
        }
        return Api::setResponse('user', $user);
    }

    public function authProfile(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->category;
        return Api::setResponse('user', $user);
    }

    public function addFavorite(Request $request)
    {
        $user = Auth::guard('api')->user();

      FavoriteNurse::create([
            'user_id' => $user->id,
            'nurse_id' => $request->nurse_id
        ]);
        $user->isFavorite=true;
        return Api::setResponse('favorite',$user);
    }

    public function getFavorite(Request $request)
    {
        $user = Auth::guard('api')->user();

        $favorites = $user->favorites;
        $fav=[];
        foreach ($favorites as $key => $favorit) {
            $favorit->isFavorite =true;
            $fav[]=$favorit;
        }
        return Api::setResponse('favorites', $fav);
    }

    public function updateNurse(Request $request)
    {

        $user = Auth::guard('api')->user();
        if ($request->qualifications) {
            foreach ($user->qualifications as $item) {
                $item->delete();
            }
            foreach ($request->qualifications as $item) {
                Qualification::create([
                    'user_id' => $user->id,
                    'degree' => $item['degree'],
                    'institude' => $item['institude'],
                    'year' => $item['year']
                ]);
            }
        }

        if ($request->specifications) {
            foreach ($user->specifications as $item) {
                $item->delete();
            }
            foreach ($request->specifications as $specification) {
                Specification::create([
                    'user_id' => $user->id,
                    'spec_name' => $specification['spec_name'],
                    'exp' => $specification['exp']
                ]);
            }
        }


        $user = User::find(Auth::guard('api')->user()->id);
        $user->qualifications;
        $user->specifications;
        $user->category;

        return Api::setResponse('nurse', $user->withToken());
    }

    public function nurse_rating(Request $request)
    {
        $user = Auth::guard('api')->user();

        NurseRating::create([
            'user_id' => $user->id,
            'nurse_id' => $request->nurse_id,
            'rating' => $request->rating

        ]);
        return Api::setMessage('rating added succesfully');
    }

    public function updateUser(Request $request)
    {
        $user = Auth::guard('api')->user();

        $user->update($request->all());
        $user->category;
        $user->qualifications;
        $user->specifications;

        return Api::setResponse('user', $user->withToken());
    }

    public function get_nurse_Profile(Request $request)
    {
        $nurse = User::find($request->nurse_id);
        $nurse->category;

        return Api::setResponse('nurse', $nurse);
    }

    public function update_amount(Request $request){

        $user = User::find(Auth::user()->id);
        $user->update([
            'balance' => $request->amount
        ]);
        return Api::setMessage('Balance added succesfully');
    }

    public function hospital_card(Request $request){

        $hospital = Auth::user();
        $hospital->update([
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_cvc' => $request->card_cvc,
            'card_expiry' => $request->card_expiry,
        ]);

        // return Api::setMessage('Hospital Card Credentials Updated');
        
        $response = new Api;
        $response->add('success','Hospital Card Credentials Updated');
        $response->add('hospital',$hospital);
        return $response->json();

    }
    
    public function nurse_card(Request $request){

        $nurse = Auth::user();
        $nurse->update([
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_cvc' => $request->card_cvc,
            'card_expiry' => $request->card_expiry,
        ]);

        // return Api::setMessage('Nurse Card Credentials Updated');
        $nurse->qualifications;
        $nurse->specifications;
        $nurse->category;
        $response = new Api;
        $response->add('success','Nurse Card Credentials Updated');
        $response->add('nurse',$nurse);
        return $response->json();

    }

    public function getWalet(Request $request){

        $user = Auth::user();
        return Api::setResponse('user', $user);
    }

    // public function deleteCard(Request $request){

    //     $user = Auth::user();
    //     $user->update([
    //         'card_name' => null,
    //         'card_number' => null,
    //         'card_cvc' => null,
    //         'card_expiry' => null,
    //     ]);
    //     return Api::setResponse('user', $user);

    // }


}
