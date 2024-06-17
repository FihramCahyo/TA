<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\MakananUser;
use App\Models\User;
use App\Models\Voting;
use App\Models\VotingUser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datauser = User::all();
        $dataCountVote = VotingUser::all();
        $dataCountMakanan = MakananUser::all();

        $userCount = $datauser->count();
        $voteCount = $dataCountVote->count();
        $makananCount = $dataCountMakanan->count();
        $totalPengeluaran = (new KeuanganController)->getTotalPengeluaran();

        return view('Dashboard', [
            'userCount' => $userCount,
            'voteCount' => $voteCount,
            'makananCount' => $makananCount,
            'totalPengeluaran' => $totalPengeluaran,
        ]);
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
}
