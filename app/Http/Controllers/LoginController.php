<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }else{
           dd('No esta autorizado');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        return redirect(route('login'));
    }
}
