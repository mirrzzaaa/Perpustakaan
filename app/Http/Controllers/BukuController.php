<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $bukus = $query->paginate(10);

        // Cek jika permintaan berasal dari AJAX
        if ($request->ajax()) {
            return view('buku.parsial.table', compact('bukus'))->render();
        }

        return view('buku.index', compact('bukus'));
    }



    public function create()
    {
        return view('buku.parsial.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
            'stok' => 'required|integer',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $namaFile = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('covers', $namaFile, 'public');
            $data['cover'] = $namaFile;
        }

        Buku::create($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
            'stok' => 'required|integer',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($buku->cover && Storage::disk('public')->exists('covers/' . $buku->cover)) {
                Storage::disk('public')->delete('covers/' . $buku->cover);
            }

            $namaFile = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('covers', $namaFile, 'public');
            $data['cover'] = $namaFile;
        }
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('covers', 'public');
            $buku->cover = $path;
        }

        $buku->update($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        // Hapus cover jika ada
        if ($buku->cover && Storage::disk('public')->exists('covers/' . $buku->cover)) {
            Storage::disk('public')->delete('covers/' . $buku->cover);
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku dihapus.');
    }
}
