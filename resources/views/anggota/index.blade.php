<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="w-full px-4 pb-10 h-full flex flex-col">
        <section class="bg-white shadow-xl p-6 rounded-xl flex-1 ">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="uppercase text-lg font-black text-slate-800 dark:text-slate-100">Daftar angggota</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-300">Daftar anggota perpustakaan</p>
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
                        placeholder="Cari anggota..." autocomplete="off">
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 py-2 px-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabel Anggota --}}
            <div id="result">
                @include('anggota.partials.table')
            </div>


            {{-- Pagination --}}
            <div class="mt-4">
                {{ $anggotas->links() }}
            </div>
    </div>
    </section>
    </div>

    {{-- Modal Tambah Anggota --}}
    <div id="modalForm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded-xl w-[400px] shadow-xl relative">
            <h2 class="text-center font-bold text-lg mb-4">Tambah Anggota</h2>
            @include('anggota.partials.create') {{-- Form partial --}}
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-xl w-[400px] shadow-xl relative">
            <h2 class="text-center font-bold text-lg mb-4">Edit</h2>
            @include('anggota.partials.edit')
            <button onclick="closeEditModal()"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('modalForm');
            modal.classList.toggle('hidden');
        }

        $(document).ready(function () {
            function fetchData(page, search) {
                $.ajax({
                    url: "{{ route('anggota.index') }}?page=" + page + "&search=" + search,
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

    <script>
        // panggil modal dan isi field
        function openEditModal(data) {
            const form = document.getElementById('editForm');
            form.action = `/anggota/${data.id}`;           // set action

            document.getElementById('editNama').value = data.nama;
            document.getElementById('editEmail').value = data.email;
            document.getElementById('editAlamat').value = data.alamat;

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // tombol Edit
        $(document).on('click', '.btn-edit', function () {
            const anggota = {
                id: $(this).data('id'),
                nama: $(this).data('nama'),
                email: $(this).data('email'),
                alamat: $(this).data('alamat'),
            };
            openEditModal(anggota);   // ← pakai objek yang benar
        });
    </script>



</x-app-layout>