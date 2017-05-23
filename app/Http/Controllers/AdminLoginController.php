<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AdminLoginController extends Controller
{
    //
    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect()->intended('home');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('home');
        }


        return redirect()->back()
            ->withErrors([
                'loginFail' => Lang::get('auth.failed'),
            ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('home');

    }

}
