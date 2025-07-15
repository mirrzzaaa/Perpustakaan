<form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="block text-sm font-medium">Nama</label>
        <input type="text" name="nama" class="w-full border rounded px-3 py-1" required>
        @error('nama')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" class="w-full border rounded px-3 py-1" required>
        @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium">Alamat</label>
        <input type="text" name="alamat" class="w-full border rounded px-3 py-1" required>
        @error('alamat')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex justify-end gap-2">
        <button type="button" onclick="toggleModal()"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded">Simpan</button>
    </div>
</form>