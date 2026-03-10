<?php

namespace App\Http\Controllers;

use App\Models\Subtest;
use App\Models\TestAttempts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubtestController extends Controller
{
    public function show($id)
    {
        $participantId = session('participant_id');

        if (!$participantId) {
            return redirect()->route('participant.create');
        }

        $currentSubtest = session('current_subtest');

        if (!$currentSubtest) {

            $firstSubtest = Subtest::orderBy('order')->first();

            session(['current_subtest' => $firstSubtest->id]);

            $currentSubtest = $firstSubtest->id;
        }

        if ($id != $currentSubtest) {
            return redirect()->route('subtests.show', $currentSubtest);
        }

        $subtest = Subtest::findOrFail($id);

        $attempt = TestAttempts::firstOrCreate([
            'participant_id' => $participantId,
            'subtest_id' => $subtest->id
        ]);

        if (!$attempt->instruction_started_at) {
            $attempt->instruction_started_at = now();
            $attempt->save();
        }

        $endTime = Carbon::parse($attempt->instruction_started_at)
            ->addMinutes($subtest->instruction_duration);

        $timeLeft = max(0, $endTime->timestamp - now()->timestamp);

        // cek apakah subtest memiliki soal
        $hasQuestions = $subtest->questions->count() > 0;

        return view('subtest.show', compact(
            'subtest',
            'timeLeft',
            'hasQuestions'
        ));
    }

    public function startTest($id)
    {
        $participantId = session('participant_id');

        $attempt = TestAttempts::where('participant_id', $participantId)
            ->where('subtest_id', $id)
            ->firstOrFail();

        // Isi started_at hanya jika masih kosong
        if (!$attempt->started_at) {
            $attempt->update([
                'started_at' => now()
            ]);
        }

        return redirect()->route('questions.show', $id);
    }
}
