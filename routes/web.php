<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/movements', [MovementController::class, 'index'])->name('movements.index');
    Route::get('/movements/{id}', [MovementController::class, 'show'])->name('movements.show');
    Route::post('/movements', [MovementController::class, 'store'])->name('movements.store');
    Route::put('/movements/{id}', [MovementController::class, 'update'])->name('movements.update');
    Route::delete('/movements/{id}', [MovementController::class, 'destroy'])->name('movements.destroy');
});

require __DIR__ . '/auth.php';
