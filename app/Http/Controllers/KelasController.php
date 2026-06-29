<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // 1. Tampilkan semua data kelas (Read)
    public function index()
    {
        $kelas = Kelas::all(); // Ambil semua data dari tabel kelas
        return view('kelas.index', compact('kelas'));
    }

    // 2. Simpan data baru (Create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
            'tahun_angkatan' => 'required|digits:4|integer',
        ]);

        // Simpan ke database
        Kelas::create($request->all());

        // Kembali ke halaman kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    // 3. Tampilkan form edit (Update - Persiapan)
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    // 4. Proses update data (Update - Eksekusi)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
            'tahun_angkatan' => 'required|digits:4|integer',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diupdate!');
    }

    // 5. Hapus data (Delete)
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}