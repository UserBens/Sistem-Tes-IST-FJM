<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubtestController;
use App\Models\Participants;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'indexLogin'])->name('index.login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::middleware('check.login')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/participant/form', [ParticipantController::class, 'create'])->name('participant.create');
    Route::post('/participant/form', [ParticipantController::class, 'store'])->name('participant.store');

    Route::middleware('check.participant')->group(function () {

        Route::get('/subtests/{id}', [SubtestController::class, 'show'])
            ->name('subtests.show');

        Route::post('/subtest/{id}/start', [SubtestController::class, 'startTest'])
            ->name('subtest.start');

        Route::get('/subtests/{subtest}/questions', [QuestionController::class, 'question1'])
            ->name('questions.show');

        Route::post('/subtest/{subtest}/submit', [QuestionController::class, 'submit'])
            ->name('subtest.submit');

        Route::get('/test-finish', function () {

            $participant = Participants::find(session('participant_id'));

            return view('finish', compact('participant'));
        })->name('test.finish');
    });
});
