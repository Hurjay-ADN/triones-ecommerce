<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        
        $validated = $request->validate([
            'username' => ['required', 'min:5', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('login');
    }

    public function login() {
        return view('auth.login');
    }
}
