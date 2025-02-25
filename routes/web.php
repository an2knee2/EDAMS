<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\StudentAccountController;

use App\Http\Controllers\AdminController;

Route::get('/', function () {
});

Route::get('/admin/student-account', [StudentAccountController::class, 'index'])->name('admin.student_account');

// Admin Routes
Route::get('/admin/student-account', [StudentAccountController::class, 'index'])->name('admin.student_account');

Route::prefix('admin')->group(function () {
    Route::get('/student-accounts', [StudentAccountController::class, 'index'])->name('admin.student_account');
    Route::get('/schools/programs', [StudentAccountController::class, 'getProgramsBySchool'])->name('schools.programs');
    Route::patch('/student-accounts/{id}/status', [StudentAccountController::class, 'updateStatus'])->name('admin.student_account.update_status');
    Route::post('/student-accounts', [StudentAccountController::class, 'store'])->name('admin.student_account.store');
});


Route::get('/admin/signup', function () {
    return view('admin.signup');
});
Route::get('/admin/signin', function () {
    return view('admin.signin');
});
Route::get('/admin/home', function () {
    return view('admin.home');
});
Route::get('/admin/employee-account', function () {
    return view('admin.employee_account');
});
Route::get('/admin/coordinator-account', function () {
    return view('admin.coordinator_account');
});
Route::get('/admin/counselor-account', function () {
    return view('admin.counselor_account');
});
Route::get('/admin/admin-account', function () {
    return view('admin.admin_account');
});
Route::get('/admin/school', function () {
    return view('admin.school');
});
Route::get('/admin/program', function () {
    return view('admin.program');
});
Route::get('/admin/backup', function () {
    return view('admin.backup');
});


































// Student routes
Route::prefix('student')->group(function () {
    Route::get('/signup', [StudentController::class, 'create'])->name('student.signup');
    Route::post('/signup', [StudentController::class, 'store'])->name('student.store');
    Route::get('/schools-programs', [StudentController::class, 'getProgramsBySchool'])->name('schools.programs');
    Route::get('/signin', [StudentController::class, 'signin'])->name('student.signin');
    Route::post('/signin', [StudentController::class, 'authenticate'])->name('student.authenticate');
});

Route::middleware('auth:student')->prefix('student')->group(function () {
    Route::get('/home', function () {$student = Auth::guard('student')->user();return view('student.home', ['name' => $student->fullname]);})->name('student.home');
    Route::get('/assessment', function () {return view('student.assessment');})->name('student.assessment');
    Route::post('/assessment-stored', [AssessmentController::class, 'store'])->name('student.assessments.store');
    Route::get('/history', function () {return view('student.history');})->name('student.history');
    Route::get('/contact', function () {return view('student.contact');})->name('student.contact');
    Route::get('/result', function () {return view('student.result');})->name('student.result');
});


