<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="w-full px-4 pb-10 h-full flex flex-col">
        <section class="bg-white shadow-xl p-6 rounded-xl flex-1">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="uppercase text-lg font-black text-slate-800 dark:text-slate-100">Daftar Buku</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-300">Daftar buku pada perpustakaan</p>
                </div>
                <button onclick="toggleModal()"
                    class="inline-block bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg text-sm shadow transition duration-200">
                    Tambah Buku
                </button>
            </div>

            {{-- Search --}}
            <div class="mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="search" name="search"
                        class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg bg-transparent focus:outline-none focus:ring-2 focus:ring-violet-500 dark:border-slate-500"
                        placeholder="Cari judul buku..." autocomplete="off">
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 py-2 px-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabel Buku --}}
            <div id="result">
                @include('buku.parsial.table')
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $bukus->links() }}
            </div>
        </section>
    </div>

    {{-- Modal Tambah Buku --}}
    <div id="modalForm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded-xl w-[400px] shadow-xl relative">
            <h2 class="text-center font-bold text-lg mb-4">Tambah Buku</h2>
            @include('buku.parsial.create') {{-- Form partial --}}
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-xl w-[400px] shadow-xl relative">
            <h2 class="text-center font-bold text-lg mb-4">Edit</h2>
            @include('buku.parsial.edit')
            <button onclick="closeEditModal()"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        </div>
    </div>

    <script>
        // Fungsi untuk buka modal edit dan isi datanya
        function openEditModal(data) {
            const form = document.getElementById('editForm');
            form.action = `/buku/${data.id}`;

            document.getElementById('editJudul').value = data.judul;
            document.getElementById('editPenulis').value = data.penulis;
            document.getElementById('editTahun').value = data.tahun;
            document.getElementById('editStok').value = data.stok;

            // tampilkan gambar cover lama (jika ada)
            if (data.cover) {
                document.getElementById('currentCover').src = `/storage/covers/${data.cover}`;
                document.getElementById('coverPreview').classList.remove('hidden');
            } else {
                document.getElementById('coverPreview').classList.add('hidden');
            }

            document.getElementById('editModal').classList.remove('hidden');
        }

        // Fungsi untuk tutup modal
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Event listener untuk tombol edit
        $(document).on('click', '.btn-edit', function () {
            const buku = {
                id: $(this).data('id'),
                judul: $(this).data('judul'),
                penulis: $(this).data('penulis'),
                tahun: $(this).data('tahun'),
                stok: $(this).data('stok'),
                cover: $(this).data('cover'),
            };
            openEditModal(buku);
        });
    </script>



    <script>
        function toggleModal() {
            const modal = document.getElementById('modalForm');
            modal.classList.toggle('hidden');
        }



        $(document).ready(function () {
            function fetchData(page, search) {
                $.ajax({
                    url: "{{ route('buku.index') }}?page=" + page + "&search=" + search,
                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        $('#result').html(data);
                    },
                    error: function (xhr) {
                        console.error('AJAX ERROR:', xhr.responseText);
                    }
                });
            }

            $('#search').on('keyup', function () {
                const search = $(this).val();
                fetchData(1, search);
            });

            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                const page = $(this).attr('href').split('page=')[1];
                const search = $('#search').val();
                fetchData(page, search);
            });
        });
    </script>
</x-app-layout>