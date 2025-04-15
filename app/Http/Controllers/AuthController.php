<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller

{    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration logic
    public function register(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',  // Password confirmation
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect to login page after successful registration
        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure you have the login view
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the posts index
            return redirect()->route('posts.index');
        }

        // Authentication failed, redirect back with error
        return redirect()->back()->withErrors('Invalid credentials');
    }

    // Handle logout functionality
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to login page after logout
    }
    
}
