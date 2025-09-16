<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'ようこそ');
        }

        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません',
        ])->onlyInput('email');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'さようなら');
    }
}
