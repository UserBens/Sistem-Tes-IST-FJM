<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubtestController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/subtests/{id}', [SubtestController::class, 'show'])->name('subtests.show');
Route::get('/subtest/{order}', [SubtestController::class, 'subtest']);