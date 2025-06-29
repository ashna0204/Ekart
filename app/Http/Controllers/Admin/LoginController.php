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
        $input = $request->only(['username','password']);
        $remember = $request->has('remember');

        if(auth()->guard('admin')->attempt($input, $remember)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return back()->withErrors(['login' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request){
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
