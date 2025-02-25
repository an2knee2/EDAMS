<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\School;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Show registration form
     */
    public function create() {
        $schools = School::all();
        return view('student.signup', compact('schools'));
    }
    
    public function getProgramsBySchool(Request $request) {
        $schoolId = $request->query('school_id');
        $programs = Program::where('school_id', $schoolId)->get();
        return response()->json($programs);
    }
    
    /**
     * Handle student registration
     */
    public function store(Request $request) {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
            'program_id' => 'required|exists:programs,id',
            'contact' => 'required|digits:11|unique:students,contact',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'contact.digits' => 'Please provide a valid contact number.',
            'contact.unique' => 'This contact number is already in use.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        Student::create([
            'fullname' => $request->fullname,
            'school_id' => $request->school_id,
            'program_id' => $request->program_id,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('student.signin')->with('success', 'Account created. Please sign in.');
    }
    

    /**
     * Show sign-in form
     */
    public function signin()
    {
        return view('student.assessment');
    }
    /**
     * Handle student authentication
     */
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::guard('student')->attempt($credentials)) {
        $request->session()->regenerate();
        $student = Auth::guard('student')->user();
        return redirect()->route('student.home')->with('name', $student->fullname);
    }

    return back()->withErrors([
        'email' => 'The email or password is invalid. Try again.',
    ]);
}


}