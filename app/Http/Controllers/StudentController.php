<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentController extends Controller
{
    public function updateProfile(Request $request)
    {
        $student = Auth::guard('student')->user();
        $student->update($request->only([
            'first_name', 'middle_name', 'last_name', 'ext_name', 'sex', 'school_id', 'program_id', 'email', 'contact_number'
        ]));

        return redirect()->route('student.settings')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $student = Auth::guard('student')->user();

        if (!Hash::check($request->current_password, $student->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $student->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('student.settings')->with('success', 'Password updated successfully.');
    }

    public function deactivate(Request $request)
    {
        $student = Auth::guard('student')->user();
        $student->update(['status' => 'deactivated']);

        Auth::guard('student')->logout();

        return redirect()->route('login')->with('success', 'Account deactivated successfully.');
    }
}