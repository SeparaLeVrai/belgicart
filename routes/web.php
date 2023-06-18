<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\GuestController;
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
// Route::get('images-slides', [AccueilController::class, 'carousel']);
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{pseudo}', [UserController::class, 'show'])->name('users.profile');
Route::get('/quizz', [QuizzController::class, 'quizz'])->name('quizz');

Route::get('/maps/relief', [MapsController::class, 'relief'])->name('relief');
Route::get('/maps/hydrographie', [MapsController::class, 'hydrographie'])->name('hydrographie');
Route::get('/maps/monuments', [MapsController::class, 'monuments'])->name('monuments');
Route::get('/maps/population', [MapsController::class, 'population'])->name('population');
Route::get('/maps/lieux-insolites', [MapsController::class, 'insolites'])->name('lieux-insolites');


// Route::get('/form-errors', FormErrorsComponent::class)->name('app.FormErrors');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', AdminController::class);
});

Route::delete('/admin/users/{users}', [AdminController::class, 'destroy'])->name('users.destroy');
Route::post('questions-add', [AdminController::class, 'storeQuizz']);
Route::post('img-add', [AdminController::class, 'storeImg']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
