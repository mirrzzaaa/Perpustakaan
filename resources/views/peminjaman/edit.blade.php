<x-app-layout>
    <div class="container">
        <h2 class="mb-4 text-xl font-semibold">Edit Data Peminjaman</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Anggota -->
            <div class="mb-3">
                <label for="anggota_id" class="form-label">Nama Anggota</label>
                <select name="anggota_id" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ $peminjaman->anggota_id == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Buku -->
            <div class="mb-3">
                <label for="buku_id" class="form-label">Judul Buku</label>
                <select name="buku_id" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ $peminjaman->buku_id == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pinjam -->
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}"
                    required>
            </div>

            <!-- Tanggal Kembali -->
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control"
                    value="{{ $peminjaman->tanggal_kembali }}" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="dipinjam" {{ $peminjaman->status === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $peminjaman->status === 'dikembalikan' ? 'selected' : '' }}>
                        Dikembalikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</x-app-layout>