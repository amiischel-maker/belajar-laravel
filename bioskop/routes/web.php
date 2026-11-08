<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BioskopController;

Route::get('/', [BioskopController::class, 'index']);

Route::post('/proses', [BioskopController::class, 'proses'])
    ->name('bioskop.proses');