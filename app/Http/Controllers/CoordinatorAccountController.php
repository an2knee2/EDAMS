<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\School;

class CoordinatorAccountController extends Controller
{
    public function index()
    {
        $coordinators = Coordinator::all();
        $schools = School::all(); 
        return view('admin.coordinator_account', compact('coordinators', 'schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:coordinators',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:coordinators',
            'password' => 'required|confirmed',
        ]);

        $coordinator = new Coordinator($request->all());
        $coordinator->password = bcrypt($request->password);
        $coordinator->status = 'Activated';
        $coordinator->save();

        return redirect()->route('admin.coordinator_account')->with('success', 'A new coordinator account added successfully.');
    }

    public function updateStatus($id, Request $request)
    {
        $coordinator = Coordinator::findOrFail($id);
        $coordinator->status = $request->status;
        $coordinator->save();

        return response()->json(['success' => true, 'new_status' => $coordinator->status, 'message' => 'Status updated successfully.']);
    }
}
