<div class="overflow-x-auto max-h-[calc(100vh-250px)] overflow-y-auto rounded-lg">
    <table class="w-full text-sm text-left border border-slate-300">
        <thead class="bg-violet-600 hover:bg-violet-700 text-white text-xs uppercase sticky top-0 z-10 text-center">
            <tr>
                <th class="border px-2 py-2">no</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Penulis</th>
                <th class="border px-4 py-2">Tahun</th>
                <th class="border px-4 py-2">Stok</th>
                <th class="border px-4 py-2">Cover</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($bukus as $buku)
                <tr class="hover:bg-slate-50">
                    <td class="border px-2 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $buku->judul }}</td>
                    <td class="border px-4 py-2">{{ $buku->penulis }}</td>
                    <td class="border px-4 py-2">{{ $buku->tahun }}</td>
                    <td class="border px-4 py-2">{{ $buku->stok }}</td>
                    <td class="border px-4 py-2 flex justify-center">
                        @if($buku->cover)
                            <img src="{{ asset('storage/covers/' . $buku->cover) }}" width="60">
                        @else
                            <span class="text-slate-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center gap-2">
                            <button type="button"
                                class="btn-edit bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs shadow"
                                data-id="{{ $buku->id }}" data-judul="{{ $buku->judul }}"
                                data-penulis="{{ $buku->penulis }}" data-tahun="{{ $buku->tahun }}"
                                data-stok="{{ $buku->stok }}" data-cover="{{ $buku->cover }}">
                                Edit
                            </button>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow"
                                    onclick="return confirm('Yakin hapus buku ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-6 text-slate-500 italic">Tidak ada buku ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $bukus->links() }}
    </div>
</div>