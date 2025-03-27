<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounselorController extends Controller
{
    public function index()
    {
        return view('counselor.home');
    }
}
