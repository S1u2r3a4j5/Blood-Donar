<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {

            try {
                
                $user = Auth::user();
                // Create a token for the authenticated user
                $token = $user->createToken('Blood-Donar')->plainTextToken;

                return response()->json([
                    'access_token' => 'bearer '.$token,
                    'token_type' => 'Bearer',
                    'message' => 'Login successful',
                ], 200);

            } catch (\Exception $e) {

                return response()->json([
                    'message' => 'Error creating token',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }

        // Password incorrect message ke liye
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // return back()->withErrors([
            //     'password' => 'The password you entered is incorrect.',
            // ]);
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials are incorrect.',
        // ])->withInput();
        return response()->json([
            'message' => 'incorrect credentials',
        ], 401);
    }

   
    public function logout(Request $request)
    {
        Auth::user()->tokens->each(function ($token) {
            $token->delete(); // Delete the user's API token
        });

        // Optionally, if you are using web sessions, invalidate the session here:
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully!']);
    }

}
