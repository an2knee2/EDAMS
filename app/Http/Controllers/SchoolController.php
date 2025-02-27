<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('admin.school', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required|unique:schools,school_name',
            'abbreviation' => 'required|unique:schools,abbreviation',
        ]);

        School::create([
            'school_name' => $request->school_name,
            'abbreviation' => $request->abbreviation,
        ]);

        return redirect()->route('admin.school')->with('success', 'School added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school_name' => 'required|unique:schools,school_name,' . $id,
            'abbreviation' => 'required|unique:schools,abbreviation,' . $id,
        ]);

        $school = School::findOrFail($id);
        $school->update([
            'school_name' => $request->school_name,
            'abbreviation' => $request->abbreviation,
        ]);

        return redirect()->route('admin.school')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('admin.school')->with('success', 'School deleted successfully.');
    }
}
