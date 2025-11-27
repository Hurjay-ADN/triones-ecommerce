<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function store(Request $request) {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::attempt($credentials)){

            $user = Auth::user();

            $request->session()->regenerateToken();

            if ($user->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }
        return back()->onlyInput('username')->withErrors([
            'username' => 'Credential is incorrect'
        ]);
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
