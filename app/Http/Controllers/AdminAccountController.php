<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); 
        return view('admin.admin_account', compact('admins'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:admins',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);

        Admin::create([
            'id_number' => $request->id_number,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'ext_name' => $request->ext_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'Activated',
        ]);

        return redirect()->route('admin.admin_account')->with('success', 'Admin created successfully.');
    }

    public function updateStatus($id, Request $request)
    {
        $admin = Admin::findOrFail($id);
        $admin->status = $request->status;
        $admin->save();

        return response()->json(['success' => true, 'new_status' => $admin->status, 'message' => 'Status updated successfully.']);
    }
}
