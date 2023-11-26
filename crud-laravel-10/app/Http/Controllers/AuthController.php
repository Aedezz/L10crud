<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $emailCredentials = ['email' => $request->input('username'), 'password' => $request->input('password')];

        if (Auth::attempt($credentials) || Auth::attempt($emailCredentials)) {
            // Check the role and redirect accordingly
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('welcome'); // Change this line to your desired route
            }
        }

        return redirect()->route('login')->with('error', 'Invalid login credentials');
    }
}



