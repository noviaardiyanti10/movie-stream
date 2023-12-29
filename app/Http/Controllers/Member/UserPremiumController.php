<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserPremium;
use Illuminate\Http\Request;

class UserPremiumController extends Controller
{
    public function index(){
        $userID = auth()->user()->id;
        $userPremium = UserPremium::with('package')
                        ->where('user_id', $userID)
                        ->first();

        if(!$userPremium){
            return redirect()->route('member.pricing');
        }


        return view('member.subcription', ['data' => $userPremium]);
    }

    public function destroy($id){
        UserPremium::destroy($id);

        return redirect()->route('member.dashboard.movies');
    }
}
