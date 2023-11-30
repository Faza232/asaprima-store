<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illumminate\Facades\AuthRequest;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('/dashboard/article');
        }
        return view('admin.auth.login');
    }

    public function loginAction(Request $request){
        if(!Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))){
            return redirect()->route('login')->withErrors(['login'=>'username or password is incorrect']);
        }
        $request->session()->regenerate();
        return redirect()->intended('/dashboard/article');
    }
}
