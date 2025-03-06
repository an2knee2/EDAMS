<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counselor;
use App\Models\School;

class CounselorAccountController extends Controller
{
    public function index()
    {
        $counselors = Counselor::all();
        return view('admin.counselor_account', compact('counselors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:counselors',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:counselors',
            'password' => 'required|confirmed',
        ]);

        $counselor = new Counselor($request->all());
        $counselor->password = bcrypt($request->password);
        $counselor->status = 'Activated';
        $counselor->save();

        return redirect()->route('admin.counselor_account')->with('success', 'A new counselor account added successfully.');
    }

    public function updateStatus($id, Request $request)
    {
        $counselor = Counselor::findOrFail($id);
        $counselor->status = $request->status;
        $counselor->save();

        return response()->json(['success' => true, 'new_status' => $counselor->status, 'message' => 'Status updated successfully.']);
    }
}
