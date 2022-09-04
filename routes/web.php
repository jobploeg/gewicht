<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\LogController::class, 'create'])->name('dashboard');

    Route::delete('dashboard/{log}', [App\Http\Controllers\LogController::class, 'destroy'])->name('dashboard');

    Route::post('dashboard', [App\Http\Controllers\LogController::class, 'store'])->name('dashboard');
    Route::get('dashboard', [App\Http\Controllers\LogController::class, 'index'])->name('dashboard');
    Route::get('stats', [App\Http\Controllers\ChartJSController::class, 'index'])->name('stats');

    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile');
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});

