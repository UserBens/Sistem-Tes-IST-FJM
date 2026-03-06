<?php

namespace App\Http\Controllers;

use App\Models\Subtest;
use Illuminate\Http\Request;

class SubtestController extends Controller
{
    public function show($id)
    {
        $subtest = Subtest::findOrFail($id);

        return view('subtest.show', compact('subtest'));
    }
}
