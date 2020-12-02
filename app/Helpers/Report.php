<?php
namespace App\Helpers;

use App\Models\Post;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Carbon;
use stdClass;

class Report
{
    public static function monthlyPosts(){
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->endOfMonth();

        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->posts = Post::whereBetween('created_at',[$start,$clone->endOfDay()])->count();
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }
    
    public static function monthlyUsers(){
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->endOfMonth();

        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->users = User::whereBetween('created_at',[$start,$clone->endOfDay()])->count();
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }
}