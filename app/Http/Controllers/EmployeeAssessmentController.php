<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeAssessment; 

class EmployeeAssessmentController extends Controller
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

        // Get the authenticated employee
        $user = Auth::guard('employee')->user();

        // Concatenate fullname
        $fullname = trim("{$user->first_name} {$user->middle_name} {$user->last_name} {$user->extension_name}");

        // Store the assessment
        EmployeeAssessment::create([ // Rename to EmployeeAssessment if applicable
            'employee_id' => $user->id,
            'fullname' => $fullname,
            'score' => $totalScore,
            'status' => $status,
        ]);

        // Redirect with results
        return redirect()->route('employee.result')->with([
            'score' => $totalScore,
            'status' => $status,
            'success' => 'Assessment completed successfully.'
        ]);
    }

    public function inheritUserData()
    {
        // Get the authenticated employee
        $user = Auth::guard('employee')->user();
        return response()->json($user);
    }
}