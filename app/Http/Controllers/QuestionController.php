<?php

namespace App\Http\Controllers;

use App\Models\ParticipantAnswer;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use App\Models\TestAttempts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question1(Request $request, $subtestId)
    {
        $participantId = session('participant_id');

        if (!$participantId) {
            return redirect()->route('participant.create');
        }

        $currentSubtest = session('current_subtest');

        if ($subtestId != $currentSubtest) {
            return redirect()->route('subtests.show', $currentSubtest);
        }

        $subtest = Subtest::with('questions.options')
            ->findOrFail($subtestId);

        $attempt = TestAttempts::firstOrCreate([
            'participant_id' => $participantId,
            'subtest_id' => $subtest->id
        ]);

        /**
         * PROTEKSI TIMER INSTRUKSI
         */

        if (!$attempt->instruction_started_at) {
            return redirect()->route('subtests.show', $subtest->id);
        }

        $instructionEnd = Carbon::parse($attempt->instruction_started_at)
            ->addMinutes($subtest->instruction_duration);

        // Jika waktu instruksi belum habis, kembali ke halaman instruksi
        if (now()->lt($instructionEnd)) {
            return redirect()->route('subtests.show', $subtest->id);
        }

        /**
         * MULAI TIMER SOAL
         */

        if (!$attempt->started_at) {

            $attempt->started_at = now();
            $attempt->save();
        }

        $endTime = Carbon::parse($attempt->started_at)
            ->addMinutes($subtest->question_duration);

        $timeLeft = max(0, $endTime->timestamp - now()->timestamp);

        $questions = $subtest->questions->values();

        $index = $request->get('index', 0);

        $currentQuestion = $questions[$index] ?? null;

        if (!$currentQuestion) {
            return redirect()->route('subtests.show', $subtest->id);
        }

        return view('question.question1', [
            'subtest' => $subtest,
            'question' => $currentQuestion,
            'questions' => $questions,
            'currentIndex' => $index,
            'totalQuestion' => $questions->count(),
            'timeLeft' => $timeLeft
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

            if ($question->question_type == 'single_choice') {

                ParticipantAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'option_id' => $answer
                ]);
            } elseif ($question->question_type == 'multiple_choice') {

                foreach ($answer as $optionId) {

                    ParticipantAnswer::create([
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                        'option_id' => $optionId
                    ]);
                }
            } elseif ($question->question_type == 'essay') {

                ParticipantAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'essay_answer' => $answer
                ]);
            } elseif ($question->question_type == 'number_choice') {

                $number = implode('', $answer);

                ParticipantAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'essay_answer' => $number
                ]);
            }
        }

        // hitung score
        $score = 0;

        $answers = ParticipantAnswer::where('attempt_id', $attempt->id)->get();

        foreach ($answers as $answer) {

            $question = Question::find($answer->question_id);

            // =====================
            // PILIHAN GANDA
            // =====================
            if ($answer->option_id) {

                $option = QuestionOption::find($answer->option_id);

                if ($option && $option->is_correct) {
                    $score += $question->weight;
                }
            }

            // =====================
            // ESSAY
            // =====================
            if ($answer->essay_answer && $question->question_type == 'essay') {

                $userAnswer = strtolower(trim($answer->essay_answer));

                $option = QuestionOption::where('question_id', $question->id)
                    ->whereRaw('LOWER(option_text) = ?', [$userAnswer])
                    ->first();

                if ($option) {
                    $score += $option->answer_score;
                }
            }

            // =====================
            // NUMBER CHOICE
            // =====================
            if ($answer->essay_answer && $question->question_type == 'number_choice') {

                if (trim($answer->essay_answer) == trim($question->correct_answer)) {
                    $score += $question->weight;
                }
            }
        }

        $totalQuestions = Question::where('subtest_id', $subtestId)->count();

        TestAttempts::where('id', $attempt->id)->update([
            'finished_at' => now(),
            'score' => $score,
            'total_questions' => $totalQuestions
        ]);


        // SIMPAN SCORE KE SESSION
        session(['score' => $score]);

        // AMBIL SUBTEST BERIKUTNYA
        $currentSubtest = Subtest::findOrFail($subtestId);

        $nextSubtest = Subtest::where('order', '>', $currentSubtest->order)
            ->orderBy('order')
            ->first();

        if ($nextSubtest) {

            session(['current_subtest' => $nextSubtest->id]);

            return redirect()->route('subtests.show', $nextSubtest->id);
        }

        return redirect()->route('test.finish');
    }
}
