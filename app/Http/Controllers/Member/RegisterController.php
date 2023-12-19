<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Member\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('member.register');
    }

    public function store(RegisterRequest $request){
        $data = $request->except('_token');

        $checkEmail = User::where('email', $request->email)->exists();

        if($checkEmail){
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        $data['role'] = 'member';
        $data['password'] = Hash::make($request->password); 

        User::create($data);

        return redirect()->route('member.login');

    }
}
