<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->update($request->only('first_name', 'middle_name', 'last_name', 'ext_name', 'email'));

        return redirect()->route('admin.settings')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.settings')->with('success', 'Password updated successfully.');
    }

    public function deactivate(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->active = false;
        $admin->save();

        Auth::guard('admin')->logout();

        return redirect('/login')->with('success', 'Account deactivated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You logged out successfully.');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
