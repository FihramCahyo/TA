<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Makanan;
use App\Models\User;
use App\Models\MakananUser;
use Illuminate\Http\Request;


class KeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::with('user', 'makanan')->get();
        return view('keuangan.index', compact('keuangans'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $makanans = MakananUser::with('user', 'makanan')->get();
        $jenis = Keuangan::getTypes();
        return view('keuangan.create', compact('users', 'makanans', 'jenis'));
    }

    public function getMakananbyKeuangan($id)
    {
        $makanans = MakananUser::where('user_id', $id)->with('makanan')->get();
        return response()->json($makanans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|in:' . implode(',', Keuangan::getTypes()),
            'user_id' => 'required|exists:users,id',
            'makanan_id' => 'required|exists:makanans,id',
        ]);

        // Buat instance baru dari model Keuangan dan isi dengan data dari request
        Keuangan::create([
            'date' => $request->input('date'),
            'type' => $request->input('type'),
            'user_id' => $request->input('user_id'),
            'makanan_id' => $request->input('makanan_id'),
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }


    public function edit(Keuangan $keuangan)
    {
        $makanans = Makanan::all(); // Ambil semua makanan dari tabel makanans
        $jenis = Keuangan::getTypes();
        return view('keuangan.edit', compact('keuangan', 'makanans', 'jenis'));
    }


    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|in:' . implode(',', Keuangan::getTypes()),
            // 'user_id' => 'required|exists:users,id', // Tidak perlu karena user_id tidak diubah
            'makanan_id' => 'required|exists:makanans,id',
        ]);

        // Perbarui hanya field yang diperlukan
        $keuangan->update([
            'date' => $request->input('date'),
            'type' => $request->input('type'),
            'makanan_id' => $request->input('makanan_id'),
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil dihapus.');
    }
}
