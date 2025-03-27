<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentAssessment;
use App\Models\EmployeeAssessment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch counts for each anxiety level
        $counts = $this->getAnxietyCounts();

        $severeCount = $counts['Severe Anxiety'] ?? 0;
        $moderateCount = $counts['Moderate Anxiety'] ?? 0;
        $lowCount = $counts['Low Anxiety'] ?? 0;

        // Calculate total anxiety count
        $totalAnxietyCount = $severeCount + $moderateCount + $lowCount;

        // Prepare data for the pie chart
        $pieChartData = [
            'severe' => $severeCount,
            'moderate' => $moderateCount,
            'low' => $lowCount,
        ];

        // Calculate the total number of unique users with anxiety
        $uniqueAnxietyUsers = $this->getUniqueAnxietyUsersCount();

        // Fetch daily counts for the second chart
        $dailyCounts = $this->getDailyAnxietyCounts();

        return view('admin.home', compact('severeCount', 'moderateCount', 'lowCount', 'totalAnxietyCount', 'pieChartData', 'uniqueAnxietyUsers', 'dailyCounts'));
    }

    private function getAnxietyCounts()
    {
        // Get the latest record for each student
        $studentLatest = StudentAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('student_assessments')
                ->groupBy('student_id');
        })->pluck('status');

        // Get the latest record for each employee
        $employeeLatest = EmployeeAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('employee_assessments')
                ->groupBy('employee_id');
        })->pluck('status');

        // Combine and count occurrences of each status
        $allStatuses = $studentLatest->merge($employeeLatest);
        return $allStatuses->countBy();
    }

    private function getUniqueAnxietyUsersCount()
    {
        // Get the latest record for each student
        $studentLatest = StudentAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('student_assessments')
                ->groupBy('student_id');
        })->count();

        // Get the latest record for each employee
        $employeeLatest = EmployeeAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('employee_assessments')
                ->groupBy('employee_id');
        })->count();

        // Combine the counts of unique students and employees
        return $studentLatest + $employeeLatest;
    }

    private function getDailyAnxietyCounts()
    {
        // Get daily counts for students
        $studentDailyCounts = StudentAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('student_assessments')
                ->groupBy('student_id', DB::raw('DATE(created_at)'));
        })
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(DISTINCT student_id) as count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->pluck('count', 'date');

        // Get daily counts for employees
        $employeeDailyCounts = EmployeeAssessment::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('employee_assessments')
                ->groupBy('employee_id', DB::raw('DATE(created_at)'));
        })
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(DISTINCT employee_id) as count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->pluck('count', 'date');

        // Combine counts for students and employees by date
        $allDates = $studentDailyCounts->keys()->merge($employeeDailyCounts->keys())->unique()->sort();
        $dailyCounts = [
            'students' => $allDates->mapWithKeys(fn($date) => [$date => $studentDailyCounts[$date] ?? 0]),
            'employees' => $allDates->mapWithKeys(fn($date) => [$date => $employeeDailyCounts[$date] ?? 0]),
        ];

        return $dailyCounts;
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->update($request->only('first_name', 'middle_name', 'last_name', 'ext_name', 'email'));

        return redirect()->route('admin.settings')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.settings')->with('success', 'Password updated successfully.');
    }

    public function deactivate(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->active = false;
        $admin->save();

        Auth::guard('admin')->logout();

        return redirect('/login')->with('success', 'Account deactivated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You logged out successfully.');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
