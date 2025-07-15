<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="block text-sm font-medium">Judul</label>
        <input type="text" name="judul" class="w-full border rounded px-3 py-1" required>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium">Penulis</label>
        <input type="text" name="penulis" class="w-full border rounded px-3 py-1" required>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium">Tahun</label>
        <input type="number" name="tahun" class="w-full border rounded px-3 py-1" required>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium">Stok</label>
        <input type="number" name="stok" class="w-full border rounded px-3 py-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium">Cover</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-1">
    </div>
    <div class="flex justify-end gap-2">
        <button type="button" onclick="toggleModal()"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded">Simpan</button>
    </div>
</form>