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
        ]);

        // Calculate total score
        $totalScore = array_sum($request->answers);

        // Determine anxiety status
        $status = match (true) {
            $totalScore <= 21 => 'Low Anxiety',
            $totalScore <= 35 => 'Moderate Anxiety',
            default => 'Severe Anxiety',
        };

        // Get authenticated student
        $student = Auth::guard('student')->user();

        // Store the assessment
        Assessment::create([
            'student_id' => $student->id,
            'fullname' => $student->fullname,
            'school_id' => $student->school,
            'program_id' => $student->program,
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
}