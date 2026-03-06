<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use App\Models\Subtest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParticipantController extends Controller
{
    // Tampilkan form
    public function create()
    {
        return view('form-participant.index');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date'  => 'required|date',
            'gender'      => 'required|in:Laki-laki,Perempuan',
        ]);

        // Ambil api_user_id dari session yang disimpan saat login
        $validated['api_user_id'] = Session::get('api_user_id');

        // Simpan data participant
        $participant = Participants::create($validated);

        // Simpan participant_id di session
        Session::put('participant_id', $participant->id);

        // Ambil subtest pertama berdasarkan urutan
        $firstSubtest = Subtest::orderBy('order')->first();

        // Jika subtest tidak ada
        if (!$firstSubtest) {
            return redirect()->back()->with('error', 'Subtest belum tersedia.');
        }

        // Redirect ke halaman instruksi subtest pertama
        return redirect()->route('subtests.show', $firstSubtest->id);
    }
}
