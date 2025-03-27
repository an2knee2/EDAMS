<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function updateProfile(Request $request)
    {
        $employee = Auth::guard('employee')->user();
        $employee->update($request->only([
            'first_name', 'middle_name', 'last_name', 'ext_name', 'sex', 'email', 'contact_number',
        ]));

        $employee->save();

        return redirect()->route('employee.settings')->with('success', 'Profile updated successfully.');
    }

    public function showSettings()
    {
        $employee = Auth::guard('employee')->user();
        return view('employee.settings', compact('employee'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $employee = Auth::guard('employee')->user();

        if (!Hash::check($request->current_password, $employee->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $employee->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('employee.settings')->with('success', 'Password updated successfully.');
    }

    public function deactivate(Request $request)
    {
        $employee = Auth::guard('employee')->user();
        $employee->update(['status' => 'deactivated']);

        Auth::guard('employee')->logout();

        return redirect()->route('login')->with('success', 'Account deactivated successfully.');
    }
}