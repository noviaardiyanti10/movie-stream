<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.auth');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');
        $credential['role'] = 'admin';

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->route('admin.movie');
        }

        return back()->withErrors([
            'error' => 'Your credentials are wrong!'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
