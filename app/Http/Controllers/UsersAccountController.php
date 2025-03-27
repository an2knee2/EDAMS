<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersAccountController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validate the request
        $request->validate([
            'role' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Get the role, email, and password from the request
        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        // Check the role and attempt authentication
        switch ($role) {
            case 'admin':
                if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('admin.home')->with('success', 'You logged in successfully.');
                }
                break;

            case 'student':
                if (Auth::guard('student')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('student.home')->with('success', 'You logged in successfully.');
                }
                break;

            case 'employee':
                if (Auth::guard('employee')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('employee.home')->with('success', 'You logged in successfully.');
                }
                break;

            case 'coordinator':
                if (Auth::guard('coordinator')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('coordinator.home')->with('success', 'You logged in successfully.');
                }
                break;
                
            case 'counselor':
                if (Auth::guard('counselor')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('counselor.home')->with('success', 'You logged in successfully.');
                }
                break;

            default:
                return back()->withErrors(['role' => 'Invalid role selected.']);
        }

        // If authentication fails, return with an error
        return back()->withErrors([
            'email' => 'The email or password is invalid.',
            'password' => 'The email or password is invalid.'
        ]);
    }

    public function logout(Request $request)
    {
        // Get the current guard (role)
        $guard = Auth::getDefaultDriver();

        // Logout the user
        Auth::guard($guard)->logout();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/login')->with('success', 'You logged out successfully.');
    }
}