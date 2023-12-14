<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    
    // Menampilkan view Register
    public function register()
    {
        if (Auth::check()) {
            return view('admin.auth.register');
        }
        return redirect('/dashboard');
    }
 
    // Proses menyimpan data register
    public function registerSave(AuthRequest $request)
    {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
 
        return redirect('login');
    }
 
    // Menampilkan view login
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('admin.auth.login');
    }
 
    // Proses autentikasi login
    public function loginAction(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))) {
            return redirect('login')->withErrors(['login' => 'Username or password is incorrect.']);
        }
 
        $request->session()->regenerate();
 
        return redirect()->intended('/dashboard');
    }
 
    // Proses Logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();     // Membuat session baru
 
        return redirect('/');
    }
}