<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }else{
            return view('login');
        }
    }
    public function actionlogin(Request $request)
    {   
        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required']
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }
 
        // return back()->with('loginError', 'Login failed');
   
 
        // 

        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with([
            'loginError' => 'email atau Password salah',
        ]);
    

}

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}