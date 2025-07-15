<div class="overflow-x-auto max-h-[calc(100vh-250px)] overflow-y-auto rounded-lg">
    <table class="w-full text-sm text-left border border-slate-300">
        <thead class="bg-violet-600 hover:bg-violet-700 text-white text-xs uppercase sticky top-0 z-10 text-center">
            <tr>
                <th class="border px-2 py-2">No</th>
                <th class="border px-4 py-2">Nama Anggota</th>
                <th class="border px-4 py-2">Judul Buku</th>
                <th class="border px-4 py-2">Tanggal Pinjam</th>
                <th class="border px-4 py-2">Tanggal Kembali</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($peminjamans as $peminjaman)
                <tr class="hover:bg-slate-50">
                    <td class="border px-2 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->anggota->nama ?? '—' }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->buku->judul ?? '—' }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->tanggal_pinjam }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->tanggal_kembali }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->status }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center gap-2">
                            <button type="button"
                                class="btn-edit bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs shadow"
                                data-id="{{ $peminjaman->id }}" data-anggota_id="{{ $peminjaman->anggota_id }}"
                                data-buku_id="{{ $peminjaman->buku_id }}"
                                data-tanggal_pinjam="{{ $peminjaman->tanggal_pinjam }}"
                                data-tanggal_kembali="{{ $peminjaman->tanggal_kembali }}"
                                data-status="{{ $peminjaman->status }}">
                                Edit
                            </button>

                            <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow"
                                    onclick="return confirm('Yakin hapus peminjaman ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center px-4 py-6 text-slate-500 italic">Tidak ada peminjaman ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $peminjamans->links() }}
    </div>
</div>