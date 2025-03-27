<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeAssessment;

class EmployeeHistoryController extends Controller
{
    public function index()
    {
        $employee = Auth::guard('employee')->user();
        $history = EmployeeAssessment::where('employee_id', $employee->id)->get(['score', 'status', 'created_at']);

        return view('employee.history', compact('history'));
    }
}
