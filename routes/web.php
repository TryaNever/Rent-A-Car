<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);
Route::get('/vehicules', [CarController::class, 'all']);
Route::post('/vehicules/filter', [CarController::class, 'filter']);
Route::get('/vehicules/{vehicules_id}/reservation', [CarController::class, 'reservation']);
