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

        if (Auth::attempt($credentials)) {
            // Successful login ke baad session regenerate karein
            $request->session()->regenerate();

            return redirect()->route('blood-search')->with('success', 'Logged in successfully!');
        }

        // Password incorrect message ke liye
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors([
                'password' => 'The password you entered is incorrect.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ])->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('blood-search')->with('success', ' Logged out successfully! ');
    }
}
