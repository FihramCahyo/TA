<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
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
        $makanans = MakananUser::pluck('user_id', 'id');
        return view('keuangan.create', compact('users', 'makanans'));
    }

    public function getMakananbyKeuangan($id)
    {
        $makanans = MakananUser::where('user_id', $id)->get();
        return response()->json($makanans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'makanan_id' => 'required|exists:makanans,id',
        ]);

        Keuangan::create($request->all());

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit(Keuangan $keuangan)
    {
        $users = User::pluck('name', 'id');
        $makanans = MakananUser::pluck('name', 'id');
        return view('keuangan.edit', compact('keuangan', 'users', 'makanans'));
    }

    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'makanan_id' => 'required|exists:makanans,id',
        ]);

        $keuangan->update($request->all());

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil dihapus.');
    }
}
