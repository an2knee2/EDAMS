<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\School;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
        ]);

        Program::create($request->all());

        return redirect()->route('admin.program')->with('success', 'A new school is successfully added.');
    }

    public function index()
    {
        $schools = School::all();
        $programs = Program::with('school')->get();
        return view('admin.program', compact('schools', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('admin.program')->with('update', 'A program is successfully updated.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.program')->with('delete', 'A program is successfully deleted.');
    }
}
