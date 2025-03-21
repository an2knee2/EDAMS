<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate answers
        $request->validate([
            'answers' => 'required|array|size:21',
            'answers.*' => 'required|integer|min:0|max:3',
            'total_score' => 'required|integer|min:0|max:63',
        ]);

        // Calculate total score
        $totalScore = $request->total_score;

        // Determine anxiety status
        $status = match (true) {
            $totalScore <= 21 => 'Low Anxiety',
            $totalScore <= 35 => 'Moderate Anxiety',
            default => 'Severe Anxiety',
        };

        // Get authenticated student
        $student = Auth::guard('student')->user();

        // Concatenate fullname
        $fullname = trim("{$student->first_name} {$student->middle_name} {$student->last_name} {$student->extension_name}");

        // Store the assessment
        Assessment::create([
            'student_id' => $student->id,
            'fullname' => $fullname,
            'school_id' => $student->school_id,
            'program_id' => $student->program_id,
            'score' => $totalScore,
            'status' => $status,
        ]);

        // Redirect with results
        return redirect()->route('student.result')->with([
            'score' => $totalScore,
            'status' => $status,
            'success' => 'Assessment completed successfully.'
        ]);
    }

    public function inheritStudentData()
    {
        $student = Auth::guard('student')->user();
        return response()->json($student);
    }
}