<?php

namespace App\Http\Controllers;

use App\Models\Subtest;
use Illuminate\Http\Request;

class SubtestController extends Controller
{
    // public function show($id)
    // {
    //     $subtest = Subtest::findOrFail($id);

    //     return view('subtest.show', compact('subtest'));
    // }

    public function subtest($order)
    {
        $subtest = Subtest::with('questions.options')
            ->where('order', $order)
            ->firstOrFail();

        return view('subtest.show', compact('subtest'));
    }
}
