<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\MakananUser;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datamakanan = Makanan::all();

        return view('makanan.index', [
            'datamakanan' => $datamakanan
        ]);
    }

    public function detail()
    {
        $makananId = 1;

        $data = MakananUser::with('makanan')->get();
        $makananIdArray = [];

        $makananIds = $data->pluck('makanan_id')->unique();

        foreach ($makananIds as $key => $makananId) {
            $makananIdUser = $data->where('makanan_id', $makananId)->first();
            $makananId = [
                'img' => $makananIdUser->makanan->image_path,
                'nama' => $makananIdUser->makanan->name,
                'harga' => $makananIdUser->makanan->price,
                'jmlh' => $data->where('makanan_id', $makananId)->count(),
                'id' => $makananId
            ];
            $makananIdArray[$key] = $makananId;
        }

        return view('makanan.detail', [
            'data' => array_values($makananIdArray)
        ]);
    }

    public function userdetail($id)
    {
        $datamakanan = MakananUser::with('user')->where('makanan_id', $id)->get();

        return view('makanan.user-detail', ['datamakanan' => $datamakanan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('makanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data makanan
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        // Upload gambar makanan
        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $imageName);

        // Simpan data makanan ke dalam database
        Makanan::create([
            'name' => $request->name,
            'image_path' => $imageName,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect ke halaman indeks makanan dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan.');
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
        $datamakanan = Makanan::findOrFail($id);
        return view('makanan.edit', ['datamakanan' => $datamakanan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        $makanan = Makanan::findOrFail($id);

        // Mengupdate gambar makanan jika ada yang diunggah
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('makanan_images', 'public');
            $makanan->image_path = $imagePath;
        }

        // Memperbarui data makanan
        $makanan->name = $request->name;
        $makanan->description = $request->description;
        $makanan->price = $request->price;
        $makanan->save();

        // Redirect ke halaman indeks makanan dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datamakanan = Makanan::findOrFail($id);
        $datamakanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dihapus');
    }
}
