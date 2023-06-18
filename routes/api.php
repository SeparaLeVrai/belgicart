<?php

use App\Http\Controllers\QuizzController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/questions', QuizzController::class);
Route::post('/scores', [QuizzController::class, 'store']);
