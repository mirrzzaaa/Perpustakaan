<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Buku;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        $peminjamans = Peminjaman::latest()->paginate(10);
        $query = Peminjaman::with(['anggota', 'buku']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('anggota', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            })->orWhereHas('buku', function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%');
            });
        }

        $peminjamans = $query->paginate(10);

        if ($request->ajax()) {
            return view('peminjaman.partials.table', compact('peminjamans'))->render();
        }

        return view('peminjaman.index', compact('anggotas', 'bukus', 'peminjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjaman.create', compact('anggotas', 'bukus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil disimpan.');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'anggotas', 'bukus'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $data = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $peminjaman->update($data);

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

}

