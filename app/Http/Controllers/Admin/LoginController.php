<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(Type $var = null)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //dd(auth()->user());

        $remember_me= $request->rememberme == 1? true : false;
        if (auth()->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)) {
            return redirect()->route('dashboard.home');
            
        }else{
            return redirect()->route('login');
        } 
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
