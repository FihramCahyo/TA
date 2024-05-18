<?php

namespace App\Http\Controllers;

use App\Models\Voting;
use App\Models\VotingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datavoting = Voting::all();

        return view('voting.index', [
            'datavoting' => $datavoting
        ]);
    }

    public function detail()
    {
        $votingId = 1;

        $data = VotingUser::with('detail')->get();
        $votingArray = [];

        $votingIds = $data->pluck('voting_id')->unique();

        foreach ($votingIds as $key => $votingId) {
            $votingUser = $data->where('voting_id', $votingId)->first();
            $voting = [
                'img' => $votingUser->detail->image_path,
                'nama' => $votingUser->detail->restaurant_name,
                'jmlh' => $data->where('voting_id', $votingId)->count(),
                'id' => $votingId
            ];
            $votingArray[$key] = $voting;
        }

        return view('voting.detail', [
            'data' => array_values($votingArray)
        ]);
    }


    public function userdetail($id)
    {
        $datavoting = VotingUser::with('user')->where('voting_id', $id)->get();

        return view('voting.user-detail', ['datavoting' => $datavoting]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $imageName);

        Voting::create([
            'restaurant_name' => $request->restaurant_name,
            'image_path' => $imageName,
        ]);

        return redirect()->route('voting.index')->with('success', 'Data Voting berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datavoting = Voting::findOrFail($id);
        return view('voting.edit', ['datavoting' => $datavoting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'restaurant_name' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $datavoting = Voting::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $datavoting->image_path = $imageName;
        }

        $datavoting->restaurant_name = $request->restaurant_name;
        $datavoting->save();

        return redirect()->route('voting.index')->with('success', 'Data Voting berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datavoting = Voting::findOrFail($id);
        $datavoting->delete();
        return redirect()->route('voting.index')->with('success', 'Data Voting berhasil dihapus');
    }

    /**
     * Display the menu.
     */
}
