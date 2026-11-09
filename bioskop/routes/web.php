<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('/tesusia', [SampleController::class, 'tesusia']);

Route::get('/usia', [SampleController::class, 'usia']);

Route::get('/datausia', [SampleController::class, 'datausia']);