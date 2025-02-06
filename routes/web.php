<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::redirect('/', '/login');

Route::resource('absences', AbsenceController::class);

Route::get('/absences', [AbsenceController::class, 'index'])->middleware('auth');
Route::get('/absences/create', [AbsenceController::class, 'create'])->middleware('auth');
Route::post('/absences', [AbsenceController::class, 'store'])->middleware('auth');
Route::get('/absences/{absence}', [AbsenceController::class, 'show']);
Route::get('/absences/{absence}/edit', [AbsenceController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'absence');
Route::patch('/absences/{absence}', [AbsenceController::class, 'update']);
Route::delete('/absences/{absence}', [AbsenceController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'absence');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
