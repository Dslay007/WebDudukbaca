<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>@yield('title', 'Duduk Baca | Komunitas Literasi Malang')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Mengatur font Inter sebagai default */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #fcfbf9;
            /* Latar belakang krem muda */
        }

        /* Custom scrollbar style */
        .overflow-y-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .overflow-y-scroll::-webkit-scrollbar-thumb {
            background-color: #a7f3d0;
            /* light teal */
            border-radius: 4px;
        }

        /* Style untuk Green Box Review */
        .review-box {
            background-color: #e0f2f1;
            /* Green-100 for light background */
            border-left: 5px solid #14b8a6;
            /* Teal-500 border */
        }

        /* Style untuk Struktur Anggota */
        .member-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk Carousel */
        .carousel-item {
            display: none;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-item.active {
            display: block;
            opacity: 1;
        }
    </style>
    @stack('styles')
</head>

<body class="antialiased">

    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="text-2xl font-bold text-teal-600 tracking-wider">DUDUK BACA</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-4 items-center">
                    <a href="{{ route('landing') }}"
                        class="text-gray-900 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Beranda</a>
                    <!--
                    <a href="{{ route('landing') }}#tentang"
                        class="text-gray-900 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Tentang Kami</a>
                    -->
                    <a href="{{ route('page.struktur') }}"
                        class="text-gray-900 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Struktur Komunitas</a>
                    <a href="{{ route('page.jurnal') }}"
                        class="text-gray-900 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Jurnal Lapak</a>
                    <a href="{{ route('opac.index') }}"
                        class="text-white bg-teal-600 hover:bg-teal-700 px-3 py-2 rounded-full text-sm font-medium shadow-md transition duration-150 ease-in-out">
                        Perpustakaan (OPAC)
                    </a>
                    <a id="sosmed-link" href="https://instagram.com/dudukbaca" target="_blank"
                        class="text-gray-500 hover:text-teal-600 p-2 rounded-full transition duration-150 ease-in-out"
                        title="Instagram/Sosmed"><i data-lucide="instagram"></i></a>
                </div>
                <button id="menu-button"
                    class="sm:hidden text-gray-500 hover:text-teal-600 focus:outline-none p-2 transition duration-150 ease-in-out"><i
                        data-lucide="menu"></i></button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden sm:hidden px-2 pt-2 pb-3 space-y-1 bg-white border-t">
            <a href="{{ route('landing') }}"
                class="text-gray-900 hover:bg-teal-50 hover:text-teal-600 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
            <a href="{{ route('page.struktur') }}"
                class="text-gray-900 hover:bg-teal-50 hover:text-teal-600 block px-3 py-2 rounded-md text-base font-medium">Struktur Komunitas</a>
            <a href="{{ route('page.jurnal') }}"
                class="text-gray-900 hover:bg-teal-50 hover:text-teal-600 block px-3 py-2 rounded-md text-base font-medium">Jurnal Lapak</a>
            <a href="{{ route('opac.index') }}"
                class="text-white bg-teal-600 hover:bg-teal-700 block px-3 py-2 rounded-md text-base font-medium">Perpustakaan (OPAC)</a>
            <div class="flex space-x-4 p-2">
                <a id="mobile-sosmed-link" href="https://instagram.com/dudukbaca" target="_blank" class="text-gray-500 hover:text-teal-600"
                    title="Instagram/Sosmed"><i data-lucide="instagram"></i></a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-lg font-bold mb-4 text-teal-400">Duduk Baca</h4>
                    <p class="text-sm text-gray-400">Komunitas Literasi Malang. Mari Duduk, Mari Baca.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing') }}" class="text-sm text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('page.struktur') }}" class="text-sm text-gray-400 hover:text-white">Struktur Komunitas</a></li>
                        <li><a href="{{ route('page.jurnal') }}" class="text-sm text-gray-400 hover:text-white">Jurnal Lapak</a></li>
                        <li><a href="{{ route('opac.index') }}" class="text-sm text-teal-400 hover:text-teal-300 font-bold">Perpustakaan (OPAC)</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Kontak & Kegiatan</h4>
                    <ul class="space-y-2">
                        <li><a id="footer-linktree" href="https://linktr.ee/dudukbaca" target="_blank"
                                class="text-sm text-gray-400 hover:text-white flex items-center"><i data-lucide="link"
                                    class="w-4 h-4 mr-2"></i> Linktree</a></li>
                        <li><a id="footer-sosmed" href="https://instagram.com/dudukbaca" target="_blank"
                                class="text-sm text-gray-400 hover:text-white flex items-center"><i
                                    data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram</a></li>
                        <li>
                            <p class="text-sm text-gray-400 flex items-center"><i data-lucide="map-pin"
                                    class="w-4 h-4 mr-2"></i> Lapak Alun-Alun Malang</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Lisensi & Hak Cipta</h4>
                    <p class="text-sm text-gray-400">&copy; 2025 Duduk Baca. All rights reserved.</p>
                </div>
            </div>
            <div class="mt-10 border-t border-gray-700 pt-6 text-center">
                <p class="text-sm text-gray-500">Dibuat untuk memperluas akses literasi di Malang.</p>
            </div>
        </div>
    </footer>

    <script>
        // Init Icons
        if (typeof lucide !== 'undefined') lucide.createIcons();
        document.addEventListener('DOMContentLoaded', () => {
             if (typeof lucide !== 'undefined') lucide.createIcons();

            // Mobile menu toggle
            const menuBtn = document.getElementById('menu-button');
            if (menuBtn) {
                menuBtn.addEventListener('click', () => {
                    document.getElementById('mobile-menu').classList.toggle('hidden');
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
