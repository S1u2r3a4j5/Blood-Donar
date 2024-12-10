<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // User ko authenticate karna
        if (Auth::attempt($credentials)) {
            // Successful login ke baad session regenerate karein
            $request->session()->regenerate();

            return redirect()->route('blood-search')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

 

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('blood-search')->with('success', ' Logged out successfully! ');
    }
}
