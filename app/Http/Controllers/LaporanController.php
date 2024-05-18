<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Keuangan;
use App\Models\Makanan;
use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function generateLaporan()
    {
        // Clear the existing laporans table
        Laporan::truncate();

        // Insert new records into laporans table
        DB::table('keuangans')
            ->join('makanans', 'keuangans.makanan_id', '=', 'makanans.id')
            ->join('users', 'keuangans.user_id', '=', 'users.id')
            ->leftJoin('voting_users', 'users.id', '=', 'voting_users.user_id')
            ->leftJoin('votings', 'voting_users.voting_id', '=', 'votings.id')
            ->select(
                'keuangans.date',
                'makanans.name as makanan_name',
                'makanans.price',
                'keuangans.type',
                'users.name as user_name',
                'votings.restaurant_name'
            )
            ->get()
            ->each(function ($record) {
                Laporan::create((array) $record);
            });

        // Return the generated laporan
        $laporans = Laporan::all();

        return view('laporans.index', compact('laporans'));
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
    public function show(Laporan $laporan)
    {
        $laporans = Laporan::all();
        return view('laporans.index', compact('laporans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
