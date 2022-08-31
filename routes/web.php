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

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

//LOG
Route::middleware('auth')->name('dashboard')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\LogController::class, 'create']);
    Route::post('dashboard', [App\Http\Controllers\LogController::class, 'store']);
    Route::get('dashboard', [App\Http\Controllers\LogController::class, 'index']);
});

Route::middleware('auth')->name('stats')->group(function () {
    Route::get('stats', [App\Http\Controllers\ChartJSController::class, 'index']);
});
