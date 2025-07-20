<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LavioVan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen m-0 font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-1 z-10 relative">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-purple-600">LavioVan</div>

            <!-- Hamburger Button -->
            <button id="menu-button" class="md:hidden text-purple-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu (Desktop) -->
            <ul class="hidden md:flex gap-6 text-purple-700 font-medium">
                <li><a href="#herosection" class="hover:text-purple-900">Beranda</a></li>
                <li><a href="#tentang" class="hover:text-purple-900">Tentang Kami</a></li>
                <li><a href="#koleksi-buku" class="hover:text-purple-900">Koleksi Buku</a></li>
                <li><a href="#faq" class="hover:text-purple-900">FAQ</a></li>
            </ul>
        </div>

        <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
            <ul class="flex flex-col gap-4 text-purple-700 font-medium">
                <li><a href="#herosection" class="hover:text-purple-900">Beranda</a></li>
                <li><a href="#tentang" class="hover:text-purple-900">Tentang Kami</a></li>
                <li><a href="#koleksi-buku" class="hover:text-purple-900">Koleksi Buku</a></li>
                <li><a href="#faq" class="hover:text-purple-900">FAQ</a></li>
            </ul>
        </div>
    </nav>
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative w-full h-[90vh] overflow-hidden flex items-center justify-center bg-white"
            id="herosection">
            <!-- Background image -->
            <img src="{{ asset('storage/bg-hero-laviovan1.png') }}" alt="Ilustrasi Hero"
                class="absolute inset-0 w-full h-full object-cover opacity-70 z-0" alt="Hero BG">

            <!-- Teks -->
            <div class="w-full lg:w-1/2 mt-8 lg:mt-0 text-left lg:text-left pl-4 sm:pl-6 lg:pl-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-black mb-4">
                    JENDELA DUNIA<br />ADA DI SINI
                </h1>
                <p class="text-base sm:text-lg text-gray-700 mb-6 px-2 sm:px-0">
                    Nikmati pengalaman membaca dan temukan buku-buku pilihan di perpustakaan kami.
                </p>
                <a href="#koleksi-buku"
                    class="relative z-10 inline-block bg-purple-600 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition">
                    Lihat Koleksi Buku
                </a>
            </div>

            <!-- Kolom Gambar -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('storage/hero-laviovan.png') }}" alt="Ilustrasi LavioVan"
                    class="w-4/5 sm:w-3/4 md:w-2/3 lg:w-full h-auto object-contain">
            </div>
        </section>

        <!-- Tentang Kami Section -->
        <section class="relative bg-white px-4 sm:px-6 lg:px-12 py-10" id="tentang">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

                <!-- Kolom Gambar -->
                <div>
                    <img src="{{ asset('storage/TentangKami2.png') }}" alt="LavioVan"
                        class="w-full h-auto object-contain">
                </div>

                <!-- Kolom Teks -->
                <div class="text-black text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">LavioVan</h2>
                    <p class="text-base md:text-lg leading-relaxed text-justify">
                        perpustakaan keliling berbentuk mobil van berwarna ungu yang mulai
                        beroperasi sejak tahun 2023.
                        Perpustakaan ini hadir untuk mendorong minat baca anak-anak dan remaja, khususnya di desa-desa
                        yang
                        belum memiliki akses perpustakaan tetap.
                        <br><br>
                        LavioVan secara bergantian berkeliling ke desa-desa yang telah terjadwal, membawa berbagai
                        koleksi
                        buku yang dapat dibaca di tempat
                        maupun dipinjam secara gratis. LavioVan ingin menjadikan membaca sebagai kegiatan
                        yang mudah, menyenangkan,
                        dan dapat dinikmati siapa saja .
                    </p>
                </div>
            </div>
        </section>

        {{-- Koleksi Buku --}}
        <section class="py-16 bg-white" id="koleksi-buku">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold">Koleksi Buku</h2>
            </div>

            {{-- Form Search --}}
            <form action="#koleksi-buku" method="GET" class="flex justify-center mb-10">
                <div class="relative w-full max-w-2xl">
                    <span class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" placeholder="Cari buku..."
                        class="w-full border border-purple-500 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
            </form>

            <!-- Swiper Container -->
            <div class="swiper mySwiper px-6 relative" id="koleksi-buku">
                <div class="swiper-wrapper">
                    @foreach($buku as $item)
                        <div class="swiper-slide flex justify-center">
                            <div class="w-[160px] bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                                <div class="aspect-[2/3] overflow-hidden rounded-t-xl">
                                    <img src="{{ asset('storage/covers/' . $item->cover) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="p-2">
                                    <h3 class="text-sm font-semibold text-center">{{ $item->judul }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next !text-black !right-0 z-10"></div>
                <div class="swiper-button-prev !text-black !left-0 z-10"></div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const swiper = new Swiper(".mySwiper", {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        loop: true,
                        loopAdditionalSlides: 2,
                        watchOverflow: true,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        breakpoints: {
                            640: { slidesPerView: 1 },
                            768: { slidesPerView: 2 },
                            1024: { slidesPerView: 5 }
                        }
                    });
                });
            </script>

            <section class="bg-white py-12 px-6" id="jadwal">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-4xl font-bold text-black-700 mb-6">Jadwal Kunjungan Desa</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Rabu --}}
                        <div class="bg-purple-50 rounded-xl p-4 shadow">
                            <h3 class="text-lg font-semibold text-black-700 mb-2">Rabu</h3>
                            <p class="text-gray-700">Desa Suka Maju</p>
                            <p class="text-sm text-gray-600">Pukul 10.00 - 18.00</p>
                        </div>

                        {{-- Kamis --}}
                        <div class="bg-purple-50 rounded-xl p-4 shadow">
                            <h3 class="text-lg font-semibold text-black-700 mb-2">Kamis</h3>
                            <p class="text-gray-700">Desa Harapan Baru</p>
                            <p class="text-sm text-gray-600">Pukul 10.00 - 18.00</p>
                        </div>

                        {{-- Jumat --}}
                        <div class="bg-purple-50 rounded-xl p-4 shadow">
                            <h3 class="text-lg font-semibold text-black-700 mb-2">Jumat</h3>
                            <p class="text-gray-700">Desa Mekar Jaya</p>
                            <p class="text-sm text-gray-600">Pukul 10.00 - 18.00</p>
                        </div>

                        {{-- Sabtu --}}
                        <div class="bg-purple-50 rounded-xl p-4 shadow">
                            <h3 class="text-lg font-semibold text-black-700 mb-2">Sabtu</h3>
                            <p class="text-gray-700">Desa Cipta Karya</p>
                            <p class="text-sm text-gray-600">Pukul 10.00 - 18.00</p>
                        </div>

                        {{-- Minggu --}}
                        <div class="bg-purple-50 rounded-xl p-4 shadow">
                            <h3 class="text-lg font-semibold text-black-700 mb-2">Minggu</h3>
                            <p class="text-gray-700">Desa Aman Sentosa</p>
                            <p class="text-sm text-gray-600">Pukul 10.00 - 18.00</p>
                        </div>
                    </div>
                </div>
            </section>
    </main>

    <section id="faq" class="bg-purple-600 text-white py-10">
        <div class="max-w-7xl mx-auto px-15">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-6 md:px-20">
                <!-- Kolom 1: Kontak -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Kontak</h2>
                    <p class="flex items-center gap-2"><i class="fa fa-map-marker-alt"></i> Jl. Pendidikan No. 123, Desa
                        Suka Maju</p>
                    <p class="flex items-center gap-2"><i class="fa fa-envelope"></i> info@LavioVan.id</p>
                    <p class="flex items-center gap-2"><i class="fa fa-phone"></i> 0856-5552-169</p>
                </div>

                <!-- Kolom 2: Jam Operasional -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Jam Operasional</h2>
                    <p>Rabu - Minggu</p>
                    <p>10.00 - 18.00 WIB</p>
                </div>

                <!-- Kolom 3: Ikuti Kami -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Ikuti Kami</h2>
                    <div class="flex gap-4 text-2xl">
                        <i class="fab fa-facebook-f text-white"></i>
                        <i class="fab fa-instagram text-white"></i>
                        <i class="fab fa-twitter text-white"></i>
                    </div>
                </div>
            </div>
    </section>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuButton = document.getElementById("menu-button");
            const mobileMenu = document.getElementById("mobile-menu");

            menuButton.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
            });
        });
    </script>
</body>

</html>