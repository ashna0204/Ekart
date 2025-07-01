<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function dologin(Request $request){
        $credentials = $request->only(['username','password']);
        $remember = $request->has('remember');

       if(Auth::attempt($credentials, $remember)){
        $user = Auth::user();

        if(!$user->hasRole('admin')){
            Auth::logout();
            return back()->withErrors(['login'=>'You are not authorized to access admin panel']);

        }
        return redirect()->route('admin.dashboard');
       }
       return back()->withErrors(['login' => 'Invalid credentials']);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
