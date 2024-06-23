<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\Controller;
use App\Models\Jabatan\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan semua isi di table jabatan
        $jabatan = Jabatan::all();
        return view('admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengaharahkan ke halaman create
        return view('admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi kolom
       $request->validate([
        'jabatan' => 'required|unique:jabatan,jabatan'
       ]);

       // membuat objek baru untuk menambah jabatan
       $jabatan = new Jabatan();
       $jabatan->jabatan = $request->jabatan;
       $jabatan->save();

       return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mengaharahkan ke halaman detail
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan.show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // mengaharahkan ke halaman edit
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // menemukan id data dengan findOrFail dan melakukan validasi
        $jabatan = Jabatan::findOrFail($id);
        $request->validate([
            'jabatan' => 'required|unique:jabatan,jabatan'
        ]);

        $jabatan->jabatan = $request->jabatan;
        $jabatan->save();

        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus data dengan id yang dipilih
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');;
    }
}
