<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\MakananUser;
use App\Models\Voting;
use App\Models\VotingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countUserAuthVote = $this->countUserAuthVote();
        $countUserAuthMakanan = $this->countUserAuthMakanan();

        $datavoting = Voting::all();
        $datamenu = Makanan::all();


        return view('web.menu', [
            'menu' => $datamenu,
            'data_count_makanan' => $countUserAuthMakanan,
            'data' => $datavoting,
            'data_count' => $countUserAuthVote,
        ]);
    }

    public function pilihRestoran(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'id' => 'required|exists:votings,id',
        ]);

        $countUserAuthVote = $this->countUserAuthVote();

        if ($countUserAuthVote == 0) {
            // Simpan pemilihan restoran ke dalam database (misalnya, ke tabel voting_users)
            VotingUser::create([
                'user_id' => auth()->id(),
                'voting_id' => $request->id,
            ]);
        }

        // Redirect atau kirim respon sesuai kebutuhan Anda
        return redirect()->route('menu.index', ['data_count' => $countUserAuthVote])->with('success', 'Pemilihan restoran berhasil disimpan.');
    }

    public function pilihMakanan(Request $request)
    {

        // Validasi request jika diperlukan
        $request->validate([
            'id' => 'required|exists:makanans,id',
        ]);

        $countUserAuthMakanan = $this->countUserAuthMakanan();

        if ($countUserAuthMakanan == 0) {
            // Simpan pemilihan makanan ke dalam database (misalnya, ke tabel makanan_users)
            MakananUser::create([
                'user_id' => auth()->id(),
                'makanan_id' => $request->id,
            ]);
        }

        // Redirect atau kirim respon sesuai kebutuhan Anda
        return redirect()->route('menu.index')->with('success', 'Pemilihan makanan berhasil disimpan.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function countUserAuthVote()
    {
        $dataCurrentUserLogin = Auth::user();
        $checkCountUserVote = FacadesDB::table('voting_users')->where('user_id', $dataCurrentUserLogin->id)->count();

        return $checkCountUserVote;
    }

    public function countUserAuthMakanan()
    {
        $dataCurrentUserLogin = Auth::user();
        $checkCountUserMakanan = FacadesDB::table('makanan_users')->where('user_id', $dataCurrentUserLogin->id)->count();

        return $checkCountUserMakanan;
    }
}
