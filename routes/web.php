<?php

use App\Http\Controllers\MasterData\AnotherPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterData\UserController;
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
        Route::resource('another-page', AnotherPageController::class);
        Route::resource('users', UserController::class);
    });
});
