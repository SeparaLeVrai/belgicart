<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\MapsController;
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

Route::get('/', [AccueilController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{pseudo}', [UserController::class, 'show'])->name('users.profile');
Route::get('/quizz/relief', [QuizzController::class, 'relief'])->name('relief');
Route::get('/maps/relief', [MapsController::class, 'relief'])->name('mRelief');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', AdminController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
