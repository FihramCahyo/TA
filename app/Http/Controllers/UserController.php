<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Menampilkan formulir untuk membuat pengguna baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users = User::all(); // Mendapatkan semua pengguna
        $roles = Role::all(); // Mendapatkan semua peran
        return view('user.create', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Menyimpan pengguna baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        // Validasi data input disini

        $userData = $request->except('role_id', 'password');
        $userData['password'] = Hash::make($request->password);

        $user = User::create($userData);

        // Temukan peran berdasarkan nama yang dipilih dari formulir
        $role = Role::where('name', $request->role_id)->first();

        // Periksa apakah peran ditemukan
        if ($role) {
            // Jika ditemukan, tambahkan peran ke pengguna
            $user->roles()->attach($role, ['model_type' => 'App\Models\User', 'model_id' => $user->id]);
        }

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }


    /**
     * Menampilkan formulir untuk mengedit informasi pengguna.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Mendapatkan semua peran yang tersedia
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Menyimpan perubahan informasi pengguna ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi data input disini

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Temukan peran berdasarkan nama yang dipilih dari formulir
        $role = Role::where('name', $request->role_id)->first();

        // Periksa apakah peran ditemukan
        if ($role) {
            // Jika ditemukan, hapus semua peran sebelumnya dan tambahkan peran baru
            $user->roles()->sync([$role->id => ['model_type' => User::class]]);
        }

        return redirect()->route('user.index')->with('success', 'Informasi pengguna berhasil diperbarui.');
    }

    public function show($id)
    {
        // $user = User::findOrFail($id);
        // return view('user.show', compact('user'));
    }


    /**
     * Menghapus pengguna dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
