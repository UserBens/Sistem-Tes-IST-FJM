<?php

namespace App\Http\Controllers;

use App\Models\ParticipantAnswer;
use App\Models\Question;
use App\Models\Subtest;
use App\Models\TestAttempts;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question1(Request $request, $order)
    {
        // Ambil subtest berdasarkan order
        $subtest = Subtest::with('questions.options')
            ->where('order', $order)
            ->firstOrFail();

        // Ambil semua question lalu urutkan
        $questions = $subtest->questions->sortBy('order')->values();

        // Ambil index soal dari URL (default = 0)
        $index = $request->get('index', 0);

        // Ambil soal sesuai index
        $currentQuestion = $questions[$index] ?? null;

        // Jika soal tidak ada
        if (!$currentQuestion) {
            return redirect()->route('subtests.show', $subtest->id)
                ->with('error', 'Soal tidak ditemukan');
        }

        return view('question.question1', [
            'subtest' => $subtest,
            'question' => $currentQuestion,
            'questions' => $questions,
            'currentIndex' => $index,
            'totalQuestion' => $questions->count()
        ]);
    }

    public function submit(Request $request, $subtestId)
    {
        $participantId = session('participant_id');

        $attempt = TestAttempts::firstOrCreate([
            'participant_id' => $participantId,
            'subtest_id' => $subtestId
        ]);

        $questions = Question::where('subtest_id', $subtestId)->get();

        foreach ($questions as $question) {

            $answer = $request->input('question_' . $question->id);

            if (!$answer) {
                continue;
            }

            // SINGLE CHOICE
            if ($question->question_type == 'single_choice') {

                ParticipantAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'option_id' => $answer
                ]);
            }

            // MULTIPLE CHOICE
            elseif ($question->question_type == 'multiple_choice') {

                foreach ($answer as $optionId) {

                    ParticipantAnswer::create([
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                        'option_id' => $optionId
                    ]);
                }
            }

            // ESSAY
            elseif ($question->question_type == 'essay') {

                ParticipantAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'essay_answer' => $answer
                ]);
            }

            // NUMBER CHOICE (DIGIT)
            elseif ($question->question_type == 'number_choice') {

                foreach ($answer as $digit) {

                    ParticipantAnswer::create([
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                        'essay_answer' => $digit
                    ]);
                }
            }
        }

        TestAttempts::where('id', $attempt->id)
            ->update(['finished_at' => now()]);

        return redirect('/subtests/' . ($subtestId + 1));
    }
}
