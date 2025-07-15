<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Buku;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $anggotas = $query->paginate(10);

        // Cek jika permintaan berasal dari AJAX
        if ($request->ajax()) {
            return view('anggota.partials.table', compact('anggotas'))->render();
        }

        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email',
            'alamat' => 'required|string|max:255',
        ]);

        Anggota::create($data);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }


    public function update(Request $request, Anggota $anggota)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
            'alamat' => 'required|string|max:255',
        ]);

        $anggota->update($data);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function dashboard()
    {
        $anggotaBaru = Anggota::latest()->take(7)->get();
        $totalBuku = Buku::count(); // hitung total buku
        $totalAnggota = Anggota::count(); // hitung total buku

        return view('dashboard', compact('anggotaBaru', 'totalBuku', 'totalAnggota'));
    }

}

