<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\Program;

 

class StudentAccountController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $schools = School::all(); 
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
            'contact_number' => ['required', 'regex:/^09[0-9]{9}$/', 'numeric'],
            'email' => 'required|email|unique:students,email',
            'password' => 'required|confirmed',
        ], [
            'id_number.unique' => 'The ID number is already taken.',
            'contact_number.regex' => 'The contact number must be valid.',
            'contact_number.numeric' => 'The contact number must be valid.',
            'email.unique' => 'The email address is already taken.',
            'password.confirmed' => 'The passwords did not match.',
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

        return redirect()->route('admin.student_account')->with('success', 'A new student added successfully.');
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
