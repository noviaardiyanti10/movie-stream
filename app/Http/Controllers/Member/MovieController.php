<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\UserPremium;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MovieController extends Controller
{
    public function show($id){
        $detail = Movie::find($id);

        return view('member.movie-detail', ['data' => $detail]);
    }

    public function watch($id){
        $userId = auth()->user()->id;

        $userPremium = UserPremium::where('user_id', $userId)->first();

        if($userPremium){
            $endOfSub = $userPremium->end_of_subscription;
            $date = Carbon::createFromFormat('Y-m-d', $endOfSub);
            $isValidSub = $date->greaterThan(now());

            if ($isValidSub) {
                $movie = Movie::find($id);
                return view('member.movie-watching', ['data' => $movie]);
            }
        }

        return redirect()->route('member.pricing');
    }
}
