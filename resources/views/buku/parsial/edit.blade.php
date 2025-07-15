<form id="editForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="block text-sm font-medium">Judul</label>
        <input type="text" name="judul" id="editJudul" class="w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Penulis</label>
        <input type="text" name="penulis" id="editPenulis" class="w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Tahun</label>
        <input type="number" name="tahun" id="editTahun" class="w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Stok</label>
        <input type="number" name="stok" id="editStok" class="w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Cover</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-1">

        {{-- Preview Cover --}}
        <div id="coverPreview" class="mt-2">
            <img src="" id="currentCover" class="w-9 h-auto rounded" alt="Cover lama">
        </div>
    </div>


    <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeEditModal()"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded">Simpan</>
    </div>
</form>