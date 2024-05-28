<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = Keuangan::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('laporan.cetak', compact('data'));
    }
}
