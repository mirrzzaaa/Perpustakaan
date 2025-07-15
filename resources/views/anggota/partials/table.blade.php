<div class="overflow-x-auto max-h-[calc(100vh-250px)] overflow-y-auto rounded-lg">
    <table class="w-full text-sm text-left border border-slate-300">
        <thead class="bg-violet-600 hover:bg-violet-700 text-white text-xs uppercase sticky top-0 z-10 text-center">
            <tr>
                <th class="border px-2 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Alamat</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($anggotas as $anggota)
                <tr class="hover:bg-slate-50">
                    <td class="border px-2 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $anggota->nama }}</td>
                    <td class="border px-4 py-2">{{ $anggota->email }}</td>
                    <td class="border px-4 py-2">{{ $anggota->alamat }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center gap-2">
                            <button type="button"
                                class="btn-edit bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs shadow"
                                data-id="{{ $anggota->id }}" data-nama="{{ $anggota->nama }}"
                                data-email="{{ $anggota->email }}" data-alamat="{{ $anggota->alamat }}">
                                Edit
                            </button>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow"
                                    onclick="return confirm('Yakin hapus anggota ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-6 text-slate-500 italic">Tidak ada anggota ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $anggotas->links() }}
    </div>
</div>