<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersAccountController extends Controller
{
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
                    return redirect()->route('admin.home'); // Redirect to admin dashboard
                }
                break;

            case 'student':
                if (Auth::guard('student')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('student.home'); // Redirect to student dashboard
                }
                break;

            case 'employee':
                if (Auth::guard('employee')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('employee.home'); // Redirect to employee dashboard
                }
                break;

            case 'guidance_coordinator':
                if (Auth::guard('guidance_coordinator')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('guidance_coordinator.home'); // Redirect to guidance coordinator dashboard
                }
                break;

            case 'guidance_counselor':
                if (Auth::guard('guidance_counselor')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('guidance_counselor.home'); // Redirect to guidance counselor dashboard
                }
                break;

            default:
                return back()->withErrors(['role' => 'Invalid role selected.']);
        }

        // If authentication fails, return with an error
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}