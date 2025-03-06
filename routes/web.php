<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\EmployeeAccountController;
use App\Http\Controllers\CoordinatorAccountController;
use App\Http\Controllers\CounselorAccountController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Sign-in route
Route::get('/login', function () { return view('login'); });
Route::post('/authenticate', [UsersAccountController::class, 'authenticate'])->name('authenticate');

// Admin Home Route
Route::middleware('auth:admin')->group(function () {

    // Home Route
    Route::prefix('admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    });

    // Student Account Routes
    Route::prefix('admin')->group(function () {
        Route::get('/student-accounts', [StudentAccountController::class, 'index'])->name('admin.student_account');
        Route::get('/schools/programs', [StudentAccountController::class, 'getProgramsBySchool'])->name('schools.programs');
        Route::patch('/student-accounts/{id}/status', [StudentAccountController::class, 'updateStatus'])->name('admin.student_account.update_status');
        Route::post('/student-accounts', [StudentAccountController::class, 'store'])->name('admin.student_account.store');
    });

    // Employee Account Routes
    Route::prefix('admin')->group(function () {
        Route::get('/employee-accounts', [EmployeeAccountController::class, 'index'])->name('admin.employee_account');
        Route::patch('/employee-accounts/{id}/status', [EmployeeAccountController::class, 'updateStatus'])->name('admin.employee_account.update_status');
        Route::post('/employee-accounts', [EmployeeAccountController::class, 'store'])->name('admin.employee_account.store');
    });

    // Coordinator Account Routes
    Route::prefix('admin')->group(function () {
        Route::get('/coordinator-accounts', [CoordinatorAccountController::class, 'index'])->name('admin.coordinator_account');
        Route::patch('/coordinator-accounts/{id}/status', [CoordinatorAccountController::class, 'updateStatus'])->name('admin.coordinator_account.update_status');
        Route::post('/coordinator-accounts', [CoordinatorAccountController::class, 'store'])->name('admin.coordinator_account.store');
    });

    // Counselor Account Routes
    Route::prefix('admin')->group(function () {
        Route::get('/counselor-accounts', [CounselorAccountController::class, 'index'])->name('admin.counselor_account');
        Route::patch('/counselor-accounts/{id}/status', [CounselorAccountController::class, 'updateStatus'])->name('admin.counselor_account.update_status');
        Route::post('/counselor-accounts', [CounselorAccountController::class, 'store'])->name('admin.counselor_account.store');
    });

    // Admin Account Routes
    Route::prefix('admin')->group(function () {
        Route::get('/admin-accounts', [AdminAccountController::class, 'index'])->name('admin.admin_account');
        Route::patch('/admin-accounts/{id}/status', [AdminAccountController::class, 'updateStatus'])->name('admin.admin_account.update_status');
        Route::post('/admin-accounts', [AdminAccountController::class, 'store'])->name('admin.admin_account.store');
    });

    // School Routes
    Route::prefix('admin')->group(function () {
        Route::get('/school', [SchoolController::class, 'index'])->name('admin.school');
        Route::post('/school/store', [SchoolController::class, 'store'])->name('admin.school.store');
        Route::put('/school/{id}', [SchoolController::class, 'update'])->name('admin.school.update');
        Route::delete('/school/{id}', [SchoolController::class, 'destroy'])->name('admin.school.destroy');
    });

    // Program Routes
    Route::prefix('admin')->group(function () {
        Route::get('/program', [ProgramController::class, 'index'])->name('admin.program');
        Route::post('/program/store', [ProgramController::class, 'store'])->name('admin.program.store');
        Route::put('/program/{id}', [ProgramController::class, 'update'])->name('admin.program.update');
        Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('admin.program.destroy');
    });

    // Admin Backup Route
    Route::get('/admin/backup', function () { return view('admin.backup'); });

    // Settings Routes
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/password/update', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    Route::post('/admin/deactivate', [AdminController::class, 'deactivate'])->name('admin.deactivate');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

});

// Student routes
Route::middleware('auth:student')->prefix('student')->group(function () {
    Route::get('/home', function () {$student = Auth::guard('student')->user();return view('student.home', ['name' => $student->fullname]);})->name('student.home');
    Route::get('/assessment', function () {return view('student.assessment');})->name('student.assessment');
    Route::post('/assessment-stored', [AssessmentController::class, 'store'])->name('student.assessments.store');
    Route::get('/history', function () {return view('student.history');})->name('student.history');
    Route::get('/contact', function () {return view('student.contact');})->name('student.contact');
    Route::get('/result', function () {return view('student.result');})->name('student.result');
});

// Employee routes
Route::middleware('auth:employee')->prefix('employee')->group(function () {
    Route::get('/home', function () {$employee = Auth::guard('employee')->user();return view('employee.home', ['name' => $employee->fullname]);})->name('employee.home');
});

// Coordinator routes
Route::middleware('auth:guidance_coordinator')->prefix('guidance_coordinator')->group(function () {
    Route::get('/home', function () {$coordinator = Auth::guard('guidance_coordinator')->user();return view('guidance_coordinator.home', ['name' => $coordinator->fullname]);})->name('guidance_coordinator.home');
});

// Counselor routes
Route::middleware('auth:guidance_counselor')->prefix('guidance_counselor')->group(function () {
    Route::get('/home', function () {$counselor = Auth::guard('guidance_counselor')->user();return view('guidance_counselor.home', ['name' => $counselor->fullname]);})->name('guidance_counselor.home');
});


