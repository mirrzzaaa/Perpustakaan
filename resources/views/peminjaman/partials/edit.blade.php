<form id="editForm" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="block text-sm font-medium">Nama Anggota</label>
        <select name="anggota_id" id="editAnggota" class="form-control w-full border rounded px-3 py-1" required>
            <option value="">-- Pilih Anggota --</option>
            @foreach ($anggotas as $anggota)
                <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Buku</label>
        <select name="buku_id" id="editBuku" class="form-control w-full border rounded px-3 py-1" required>
            <option value="">-- Pilih Buku --</option>
            @foreach ($bukus as $buku)
                <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" id="editTanggalPinjam"
            class="form-control w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" id="editTanggalKembali"
            class="form-control w-full border rounded px-3 py-1" required>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium">Status</label>
        <select name="status" id="editStatus" class="form-control w-full border rounded px-3 py-1" required>
            <option value="dipinjam">Dipinjam</option>
            <option value="dikembalikan">Dikembalikan</option>
        </select>
    </div>

    <div class="flex justify-end gap-2">
        <button type="button" onclick="closeEditModal()"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded">Simpan</button>
    </div>
</form>