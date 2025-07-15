<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $anggotaBaru = Anggota::latest()->take(7)->get();
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();

        // Ambil peminjaman hari ini
        $today = Carbon::today();
        $peminjamanHariIni = Peminjaman::with(['anggota', 'buku'])
            ->whereDate('tanggal_pinjam', $today)
            ->get();

        return view('dashboard', compact('anggotaBaru', 'totalBuku', 'totalAnggota', 'peminjamanHariIni'));
    }

}
