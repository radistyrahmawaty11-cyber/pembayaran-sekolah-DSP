<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil statistik untuk dashboard
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalTagihan = Tagihan::sum('jumlah');
        $tagihanLunas = Tagihan::where('status', 'lunas')->sum('jumlah');
        $tagihanBelumLunas = Tagihan::where('status', 'belum_lunas')->count();
        
        // Ambil 5 tagihan terbaru
        $tagihanTerbaru = Tagihan::with(['siswa', 'jenisPembayaran'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalKelas',
            'totalTagihan',
            'tagihanLunas',
            'tagihanBelumLunas',
            'tagihanTerbaru'
        ));
    }
}