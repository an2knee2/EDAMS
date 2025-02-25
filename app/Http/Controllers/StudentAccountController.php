<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program; // Import the Program model

class StudentAccountController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $schools = \App\Models\School::all(); // Fetch all schools
        return view('admin.student_account', compact('students', 'schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:students,id_number',
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'school_id' => 'required|exists:schools,id',
            'program_id' => 'required|exists:programs,id',
            'contact_number' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|confirmed',
        ]);

        Student::create([
            'id_number' => $request->id_number,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'ext_name' => $request->ext_name ?? null,
            'sex' => $request->sex,
            'school_id' => $request->school_id,
            'program_id' => $request->program_id,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 'Activated',
        ]);

        return redirect()->route('admin.student_account')->with('success', 'Student added successfully.');
    }

    public function getProgramsBySchool(Request $request)
    {
        $schoolId = $request->query('school_id');
        $programs = Program::where('school_id', $schoolId)->get();
        return response()->json($programs);
    }

    public function updateStatus($id, Request $request)
    {
    $student = Student::findOrFail($id);
    
    // Toggle status based on request
    if ($request->status === 'Activated' || $request->status === 'Disabled') {
        $student->status = $request->status;
        $student->save();

        return response()->json([
            'success' => true,
            'message' => "Student status updated to {$request->status}",
            'new_status' => $student->status
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Invalid status'], 400);
    }
}
