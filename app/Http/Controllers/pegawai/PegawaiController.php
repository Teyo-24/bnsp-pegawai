<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jabatan\Jabatan;
use Illuminate\Http\Request;
use App\Models\pegawai\Pegawai;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data pegawai di halaman index pegawai, all menampilkan semua, compact membuat array dari data yand ad
        $pegawai = Pegawai::with('jabatan')->get();
        return view('admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.pegawai.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|image', // memastikan file adalah gambar
        'email' => 'required|email|unique:pegawai,email', // memastikan email unik
        'name' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'jabatan_id' => 'required|exists:jabatan,id', // validasi jabatan_id
        'alamat' => 'required|string|max:255',
        ]);

        // Simpan gambar
        $imagePath = $request->file('image')->store('pegawai', 'public');

        // Buat data pegawai
        $pegawai = new Pegawai();
        $pegawai->image = $imagePath;
        $pegawai->name = $request->name;
        $pegawai->email = $request->email;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->jabatan_id = $request->jabatan_id;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();
        // dd($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // menampilkan manu detail
        $pegawai = Pegawai::findOrfail($id);
        return view('admin.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $jabatan = Jabatan::all();
        return view('admin.pegawai.edit', compact('pegawai','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
    $pegawai = Pegawai::findOrFail($id);

    $request->validate([
        'image' => 'nullable|image',
        'email' => 'required|email',
        'name' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|string',
        'jabatan_id' => 'required|exists:jabatan,id',
        'alamat' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
        // Hapus gambar lama
        if ($pegawai->image) {
            Storage::disk('public')->delete($pegawai->image);
        }
        // Simpan gambar baru
        $imagePath = $request->file('image')->store('pegawai', 'public');
        $pegawai->image = $imagePath;
    }
    // Update data pegawai
    $pegawai->email = $request->email;
    $pegawai->name = $request->name;
    $pegawai->tanggal_lahir = $request->tanggal_lahir;
    $pegawai->jenis_kelamin = $request->jenis_kelamin;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->alamat = $request->alamat;
    $pegawai->save();

    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menemukan data pegawai dari id
        $pegawai = Pegawai::findOrFail($id);

        // hapus gambar yang disimpan di storage public
        Storage::disk('public')->delete($pegawai->image);

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('Data Berhasil Dihapus');
    }
}
