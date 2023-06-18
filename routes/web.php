<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('master-data')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('master-data.index');
        Route::resource('companies', CompanyController::class);
        Route::resource('branches', BranchController::class);
        Route::resource('academic-years', AcademicYearController::class);
        Route::resource('grades', GradeController::class);
        Route::resource('classrooms', ClassroomController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('users', UserController::class);
    });
});
