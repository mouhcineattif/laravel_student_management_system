<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.student');
    }
    public function login(Request $request)
{
    $values = ['massar' => $request->massar, 'password' => $request->password];

    // Attempt to log the user in
    if (Auth::attempt($values)) {
        $request->session()->regenerate();
        // If successful, redirect to the home route
        return to_route('home')->with('success','Hello '.$request->massar.' You have Logged Succesefully!');
    }

    // If login fails, redirect back with an error message
    return back()->withErrors(['massar' => 'Massar or password is invalid'])->withInput();
}
public function logout(Request $request)
{
    // Auth::logout();  // Log the user out
    Session::flush();
    // $request->session()->invalidate();  // Invalidate the session
    // $request->session()->regenerateToken();  // Regenerate CSRF token to prevent reuse
    
    return to_route('students.login')->with('success', 'You have been logged out!');
}
}
