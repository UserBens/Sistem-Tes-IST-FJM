<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Tampilkan form
    public function create()
    {
        return view('form-participant.index');
    }

    // Simpan data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);

        // $participant = Participant::create($validated);

        // Simpan participant_id di session untuk dipakai saat tes
        // session(['participant_id' => $participant->id]);

        // Redirect ke halaman soal (misal subtest pertama)
        return redirect()->route('subtests.questions.show', 1);
    }
}
