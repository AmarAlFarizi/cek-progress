<?php

use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrackingController::class, 'index'])->name('tracking.index');

// Route::get('/cek-naskah', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/cek-naskah', [TrackingController::class, 'track'])->name('tracking.track');
Route::get('/detail/{id}', [TrackingController::class, 'detail'])->name('tracking.detail');
