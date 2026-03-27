<?php

namespace App\Http\Controllers;

use App\Models\IstResult;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardIndex(Request $request)
    {
        $query = IstResult::with('participant');
        $allFiltered = $query->clone(); // clone sebelum paginate
        
        // Filter nama
        if ($request->search) {
            $query->whereHas('participant', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori IQ
        if ($request->iq_category) {
            $query->where('iq_category', $request->iq_category);
        }

        // ✅ FILTER TANGGAL TES
        if ($request->tanggal_tes) {
            $query->whereHas('participant', function ($q) use ($request) {
                $q->whereDate('test_finished_at', $request->tanggal_tes);
            });
        }

        $results = $query->latest()->paginate(2)->withQueryString();

        // Hitung dari semua data (bukan hanya page saat ini)
        $totalPeserta = $query->count(); // ← ini sudah ter-filter
        $avgIq = round(IstResult::avg('iq'), 0); // atau sesuaikan dengan filter jika perlu

        return view('dashboard.index', compact(
            'results',
            'totalPeserta',
            'avgIq'
        ));
    }

    public function dashboardDetail($id)
    {
        $data = IstResult::with('participant')->findOrFail($id);

        return view('admin.detail', compact('data'));
    }
}
