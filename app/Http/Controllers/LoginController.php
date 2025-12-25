<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        //
        return view('auth.login');
    }
    // @desc Authenticate user
    //@route POST /login
    public function authenticate(Request $request): RedirectResponse
    {
        //
        $userCredentials = $request->validate([
            'user_code' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string'],
        ]);
        // dd($userCredentials);
        //Attempt to authenticate user 
        if (Auth::attempt($userCredentials)) {
            $request->session()->regenerate();

            return redirect()->intended('entries');
        }

        return back()->withErrors([
            'user_code' => 'The provided credentials do not match our records.',
        ])->onlyInput('user_code');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
