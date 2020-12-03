<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
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

            return $request->qualifications;

            foreach ($request->qualifications as $item) {

                $qual = Qualification::where('degree', $item->degree)->where('institude', $item->institude)->first();
                if (!$qual) {
                    Qualification::updateOrCreate([
                        'user_id' => $user->id,
                        'degree' => $item->degree,
                        'institude' => $item->institude,
                        'year' => $item->year
                    ]);
                }
            }
        }

        if ($request->specifications) {
            foreach ($request->specifications as $specification) {
                Specification::updateOrCreate([
                    'user_id' => $user->id,
                    'spec_name' => $specification->spec_name,
                    'exp' => $specification->exp
                ]);
            }
        }


        $user = User::find($user->id);
        $user->qualifications;
        $user->specifications;
        $user->category;
        return Api::setResponse('user', $user->withToken());
    }

    public function getProfile(Request $request)
    {
        $user = User::find($request->user_id);
        $user->category;
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
        return Api::setMessage('Favorite Added successfully');
    }

    public function getFavorite(Request $request)
    {
        $user = Auth::guard('api')->user();

        $favorites = $user->favorites;
        return Api::setResponse('favorites', $favorites);
    }

    public function updateNurse(Request $request)
    {

        $user = Auth::guard('api')->user();
        $user->update($request->all());
        if ($request->qualifications) {

            foreach ($request->qualifications as $item) {

                $qual = Qualification::where('degree', $item['degree'])->where('institude', $item['degree'])->first();
                if (!$qual) {
                    Qualification::updateOrCreate([
                        'user_id' => $user->id,
                        'degree' => $item['degree'],
                        'institude' => $item['institude'],
                        'year' => $item['year']
                    ]);
                }
            }
        }

        if ($request->specifications) {
            foreach ($request->specifications as $specification) {
                Specification::updateOrCreate([
                    'user_id' => $user->id,
                    'spec_name' => $specification['spec_name'],
                    'exp' => $specification['exp']
                ]);
            }
        }


        $user = Auth::guard('api')->user();
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

        return Api::setResponse('user', $user);
    }

    public function get_nurse_Profile(Request $request)
    {
        $nurse = User::find($request->nurse_id);
        $nurse->category;

        return Api::setResponse('nurse', $nurse);
    }
}
