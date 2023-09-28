<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('member.login');
    }

    public function auth(LoginRequest $request){
        
        $credential = $request->only('email', 'password');
        $credential['role'] = 'member';

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return 'success';
        }

        return back()->withErrors([
            'error' => 'Your credentials are wrong!'
        ]);

    }
}
