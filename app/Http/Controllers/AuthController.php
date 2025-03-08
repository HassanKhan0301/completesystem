<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\citie;
use App\Models\countrie;
use App\Models\state;
use Illuminate\Support\Facades\Auth;
use Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function logon(Request $request)
    {
        $request->validate([

            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required|string|min:6|',
         ]);



         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
             return redirect()->intended('/')
                         ->withSuccess('Signed in');
         }

         return redirect("login")->withSuccess('Login details are not valid');
     }

     public function logout()
     {
        Auth::logout();
        return redirect('login')->withSuccess('Logout successfully');;
     }
}
