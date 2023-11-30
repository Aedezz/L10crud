<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    $user = User::where('username', $credentials['username'])->first();

    if ($user) {
        // Rest of your logic...
        if (Auth::attempt($credentials)) {
            // Check the role and redirect accordingly
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
    
        return redirect()->route('login')->with('error', 'Invalid login credentials');
    } else {
        return redirect()->route('login')->with('error', 'User not found');
        }
    }
}

