<x-app-layout>
    <div class="container">
        <h2 class="mb-4 text-xl font-semibold">Tambah Data Peminjaman</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <!-- Anggota -->
            <div class="mb-3">
                <label for="anggota_id" class="form-label">Nama Anggota</label>
                <select name="anggota_id" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Buku -->
            <div class="mb-3">
                <label for="buku_id" class="form-label">Judul Buku</label>
                <select name="buku_id" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pinjam -->
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <!-- Tanggal Kembali -->
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>