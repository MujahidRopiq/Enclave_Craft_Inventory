<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerPost(Request $request)
    {

        $user=new User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();

        // return back()->with('success', 'Register Succesfully');

        $postreg = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($postreg)) {
            return redirect('/')->with('success', 'Register Succesfully');
        }

    }

    public function loginPost(Request $request)
    {
        $credentials = ['email'=>$request->email, 'password'=>$request->password];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Register Succesfully');
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
