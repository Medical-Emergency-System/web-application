<?php

namespace App\Http\Controllers\PWA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Patient;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $credentials = $request->only('email', 'password');
            if (Auth :: attempt($credentials)) {
                $User = User :: find(auth()->user()->id);
                $authPatient = Patient :: where('user_id', $User->id)->first();
                 return redirect()->route('index');
                }
            else{
                 return view('Login')->with('message', 'incorrect credentials');
            }
        }
        return redirect()->route('login');
    }


    public function logout(Request $request)
    {
            Auth::logout();
            return view('Login');
    }
    
}