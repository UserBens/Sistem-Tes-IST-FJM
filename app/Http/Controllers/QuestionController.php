<?php

namespace App\Http\Controllers;

use App\Models\Subtest;
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
}
