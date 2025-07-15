<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            Halaman Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Total Buku -->
                <div class="bg-white dark:bg-slate-700 shadow-xl p-6 rounded-xl flex items-center">
                    <div class="p-4 bg-violet-500 rounded-full text-white">
                        <x-heroicon-o-book-open class="w-8 h-8" />
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-500 dark:text-slate-300">Total Judul Buku</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalBuku }}</p>
                    </div>
                </div>

                <!-- Total Anggota -->
                <div class="bg-white dark:bg-slate-700 shadow-xl p-6 rounded-xl flex items-center">
                    <div class="p-4 bg-violet-500 rounded-full text-white">
                        <x-heroicon-o-user-group class="w-8 h-8" />
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-500 dark:text-slate-300">Total Anggota</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalAnggota }}</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Peminjaman dan Anggota Baru -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Peminjaman Hari Ini -->
                <div class="md:col-span-2 bg-white dark:bg-slate-700 shadow-xl rounded-xl p-6">
                    <h3 class="font-semibold text-sm uppercase text-gray-500 dark:text-slate-300 mb-3">Peminjaman Hari
                        Ini</h3>
                    @if($peminjamanHariIni->isEmpty())
                        <p class="text-slate-500 text-sm">Tidak ada peminjaman hari ini.</p>
                    @else
                        <div class="overflow-x-auto max-h-64 overflow-y-auto rounded-lg">
                            <table class="w-full text-sm text-left border border-slate-200 dark:border-slate-600">
                                <thead class="bg-violet-600 text-white text-xs uppercase sticky top-0 z-10 text-center">
                                    <tr>
                                        <th class="border px-2 py-2">No</th>
                                        <th class="border px-4 py-2">Nama Anggota</th>
                                        <th class="border px-4 py-2">Judul Buku</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-700 text-gray-800 dark:text-white">
                                    @foreach($peminjamanHariIni as $index => $p)
                                        <tr class="border-t border-slate-200 dark:border-slate-600">
                                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2">{{ $p->anggota->nama }}</td>
                                            <td class="px-4 py-2">{{ $p->buku->judul }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <!-- Anggota Baru -->
                <div class="bg-white dark:bg-slate-700 shadow-xl rounded-xl">
                    <h3 class="px-5 py-4 uppercase text-sm font-semibold text-gray-500">Anggota Baru Ditambahkan</h3>

                    <div class="max-h-60 overflow-y-auto divide-y divide-slate-200 dark:divide-slate-600">
                        @forelse($anggotaBaru as $orang)
                            <div class="flex items-center py-3 px-4">
                                <!-- Inisial Profil -->
                                <div
                                    class="flex-shrink-0 bg-gray-400 rounded-full h-10 w-10 flex items-center justify-center text-white font-bold mr-3">
                                    {{ strtoupper(substr($orang->nama, 0, 1)) }}
                                </div>

                                <!-- Nama dan Email -->
                                <div>
                                    <p class="text-sm font-semibold text-gray-800 dark:text-white truncate">
                                        {{ $orang->nama }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-slate-300 truncate">{{ $orang->email }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="flex justify-center py-3 px-4">
                                <span class="text-gray-700 dark:text-white text-sm">Tidak ada data anggota</span>
                            </div>
                        @endforelse
                    </div>
                </div>


            </div>
        </div>
</x-app-layout>