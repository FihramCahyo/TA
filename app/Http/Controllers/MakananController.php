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
        $datamakanan = Makanan::all(); // Hanya menyertakan data yang belum dihapus
        $trashedMakanan = Makanan::onlyTrashed()->get(); // Hanya menyertakan data yang sudah dihapus

        return view('makanan.index', [
            'datamakanan' => $datamakanan,
            'trashedMakanan' => $trashedMakanan
        ]);
    }

    public function detail()
    {
        $data = MakananUser::with('makanan')->get();
        $makananIdArray = [];

        $makananIds = $data->pluck('makanan_id')->unique();

        foreach ($makananIds as $key => $makananId) {
            $makananIdUser = $data->where('makanan_id', $makananId)->first();
            $makanan = [
                'img' => $makananIdUser->makanan->image_path,
                'nama' => $makananIdUser->makanan->name,
                'harga' => $makananIdUser->makanan->price,
                'jmlh' => $data->where('makanan_id', $makananId)->count(),
                'id' => $makananId
            ];
            $makananIdArray[$key] = $makanan;
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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        // Upload gambar makanan
        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images_makanan'), $imageName);

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
        // Validasi data makanan
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        $makanan = Makanan::findOrFail($id);

        // Mengupdate gambar makanan jika ada yang diunggah
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($makanan->image_path && file_exists(public_path('images_makanan/' . $makanan->image_path))) {
                unlink(public_path('images_makanan/' . $makanan->image_path));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images_makanan'), $imageName);
            $makanan->image_path = $imageName;
        }

        // Memperbarui data makanan
        $makanan->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect ke halaman indeks makanan dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datamakanan = Makanan::findOrFail($id);
        $datamakanan->delete(); //soft delete

        // Hapus gambar jika ada
        if ($datamakanan->image_path && file_exists(public_path('images_makanan/' . $datamakanan->image_path))) {
            unlink(public_path('images_makanan/' . $datamakanan->image_path));
        }

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dihapus');
    }

    public function restore($id)
    {
        $datamakanan = Makanan::withTrashed()->findOrFail($id);
        $datamakanan->restore();

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $datamakanan = Makanan::withTrashed()->findOrFail($id);

        // Hapus gambar fisik jika ada
        if ($datamakanan->image_path && file_exists(public_path('images_makanan/' . $datamakanan->image_path))) {
            unlink(public_path('images_makanan/' . $datamakanan->image_path));
        }

        $datamakanan->forceDelete();

        return back();
    }
}
