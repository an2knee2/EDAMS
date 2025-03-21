<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;

class HistoryController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $history = Assessment::where('student_id', $student->id)->get(['score', 'status', 'created_at']);

        return view('student.history', compact('history'));
    }

    public function getData()
    {
        // This method is no longer needed
    }
}
