<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function check(Request $request){
        if (! Auth::check() && $request->is('login')) {
            return view('login');
        } elseif (! Auth::check()) {
            return redirect('login');
        }

        return redirect('dashboard');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        if (Auth::attempt(($credentials + ['status' => true]), $request->get('remember'))){
            return redirect('dashboard');
        } else {
            return redirect('login')->with('success', 'false');
        }

        return redirect('login');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
