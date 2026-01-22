<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    // Show signup form
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    // Handle signup
    public function signup(SignupRequest $request)
    {
        // ✅ Create new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();



        // ✅ Option 1: Log the user in directly
        Auth::login($user);

        // ✅ Redirect with flash message
        return redirect('/')
            ->with('success', 'Account created successfully! You are now logged in.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');


        // ✅ Try to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')
                ->with('success', 'Welcome back! You are now logged in.');
        }

        // ❌ Failed login
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
