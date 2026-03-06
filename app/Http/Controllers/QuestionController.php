<?php

namespace App\Http\Controllers;

use App\Models\Subtest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question1($order)
    {
        $subtest = Subtest::with('questions.options')
            ->where('order', $order)
            ->firstOrFail();

        return view('question.question1', compact('subtest'));
    }
}
