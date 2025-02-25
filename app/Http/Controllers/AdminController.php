<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\School;

class AdminController extends Controller
{
    public function studentAccount()
{
    $schools = School::all(); // Fetch all schools from DB
    return view('admin.student_account', compact('schools'));
}
}
