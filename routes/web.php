<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubtestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/participant/form', [ParticipantController::class, 'create'])->name('participant.create');
Route::post('/participant/form', [ParticipantController::class, 'store'])->name('participant.store');

Route::get('/subtests/{id}', [SubtestController::class, 'show'])->name('subtests.show');
Route::get('/subtests/{subtest}/questions', [QuestionController::class, 'question1'])->name('questions.show');