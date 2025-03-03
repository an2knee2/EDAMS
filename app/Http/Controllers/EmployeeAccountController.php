<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeAccountController extends Controller
{
    public function index()
    {
        $employees = Employee::all(); // Retrieves all records from the 'employees' table
        return view('admin.employee_account', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:employees,id_number',
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|confirmed',
        ]);

        Employee::create([
            'id_number' => $request->id_number,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'ext_name' => $request->ext_name ?? null,
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 'Activated',
        ]);

        return redirect()->route('admin.employee_account')->with('success', 'Employee added successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Activated,Disabled',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->status = $request->status;
        $employee->save();

        return response()->json([
            'success' => true,
            'message' => "Employee status updated to {$request->status}",
            'new_status' => $employee->status
        ]);
    }
}

