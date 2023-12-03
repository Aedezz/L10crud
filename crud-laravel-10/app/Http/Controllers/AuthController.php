<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        Auth::logout();
        return View('dashboard/index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ], [
            'username.required' => 'Username wajib di isi!',
            'password.required' => 'Password wajib di isi!'
        ]);

        $loginInfo = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($loginInfo)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('welcome')->with('success', 'Anda Berhasil Login!');
            } else {
                return redirect('/')->with('success', 'Anda Berhasil Login!');
            }
        } else {
            return redirect('login')->with('error', 'Maaf ada yang salah!');
        }
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'username' => ['required'],
    //         'password' => ['required']
    //     ], [
    //         'username.required' => 'Username wajib di isi!',
    //         'password.required' => 'Password wajib di isi!'
    //     ]);
    
    //     $loginInfo = [
    //         'username' => $request->username,
    //         'password' => $request->password
    //     ];
    
    //     if(Auth::attempt($loginInfo)) 
    //     {
    //         return redirect('/')->with('success','Anda Berhasil Login!');
    //     } else {
    //         return redirect ('login')->with('error','Maaf ada yang salah!');
    //     }

    //     // The following code will not be executed
    //     $credentials = $request->only('username', 'password');

    //     $user = User::where('username', $credentials['username'])->first();

    //     if ($user) {
    //         if (Auth::attempt($credentials)) {
    //             // Check the role and redirect accordingly
    //             $user = Auth::user();
    //             if ($user->role === 'admin') {
    //                 return redirect()->route('welcome');
    //             } else {
    //                 return redirect()->route('welcome');
    //             }
    //         }

    //         return redirect()->route('login')->with('error', 'Invalid login credentials');
    //     } else {
    //         return redirect()->route('login')->with('error', 'User not found');
    //     }

    // }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
