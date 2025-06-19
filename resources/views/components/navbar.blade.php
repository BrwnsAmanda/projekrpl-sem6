<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>
    {{-- Menggunakan struktur ul dari miexed2 dengan penyesuaian dari main --}}
    <ul id="navbar-menu" class="hidden md:flex md:items-center md:space-x-6 font-medium">

        @guest
            {{-- Tautan untuk Pengguna Belum Login (Dari kedua branch, menggunakan route() dari main) --}}
            <li><a href="{{ route('home') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
            <li><a href="{{ route('tentang') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Tentang</a></li>
            <li><a href="{{ route('reservasi') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Reservasi</a></li>
            <li><a href="{{ route('login') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Akun</a></li>
        @else
            {{-- User Sudah Login (@auth) --}}
            {{-- Remove TEMPORARY DEBUG: Display user's role --}}
            {{-- <li class="text-black">Debug Role: {{ Auth::user()->role ?? 'No Role' }}</li> --}}
            @if (Auth::user()->role === 'pasien' || Auth::user()->role === 'user')
                {{-- Add Beranda link for pasien/user (Desktop) --}}
                <li><a href="{{ route('home') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
                {{-- Add Tentang link for pasien/user (Desktop) --}}
                <li><a href="{{ route('tentang') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Tentang</a></li>
                {{-- Tautan untuk Pasien (Dari main, menggunakan route()) --}}
                <li><a href="{{ route('reservasi') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Reservasi</a>
                </li>
                {{-- Remove Riwayat link from main navbar for pasien/user --}}
                {{-- <li><a href="{{ route('riwayat') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Riwayat</a></li> --}}

                {{-- Bagian profil dropdown untuk Pasien (Menggabungkan elemen dari miexed2 dan main) --}}
                <li class="relative md:ml-4 group">
                    <button type="button"
                        class="flex items-center gap-2 w-full px-6 py-3 md:p-0 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        {{-- Menambahkan ikon dropdown dari miexed2 --}}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    {{-- Menggunakan group-hover:block untuk menampilkan dropdown saat hover --}}
                    <div
                        class="hidden absolute left-0 md:right-0 md:left-auto top-full mt-0 w-48 bg-white rounded-lg shadow-lg py-2 z-50 group-hover:block">
                        {{-- Tautan Riwayat Pemeriksaan (Dari miexed2) --}}
                        <a href="{{ route('riwayat') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Riwayat Pemeriksaan
                            </div>
                        </a>
                        {{-- Tautan Edit Profil (Dari miexed2, asumsikan route profile.edit ada) --}}
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Edit Profil
                            </div>
                        </a>
                        {{-- Tautan Logout (Dari kedua branch, menggunakan teks 'Logout' dari miexed2 dan struktur form dari main) --}}
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </div>
                            </button>
                        </form>
                    </div>
                </li>
            @elseif(Auth::user()->role === 'mitra' || Auth::user()->role === 'dokter')
                {{-- Tautan untuk Mitra/Dokter (Menggabungkan dari kedua branch) --}}
                {{-- Explicitly add Beranda link for Mitra/Dokter --}}
                <li><a href="{{ route('mitra.welcome') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a>
                </li> {{-- Menggunakan route mitra.welcome dari main --}}
                <li><a href="{{ route('mitra.rujukan') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Rujukan</a>
                </li> {{-- Menggunakan route mitra.rujukan dari main --}}

                {{-- Bagian profil dropdown untuk Mitra/Dokter (Dari kedua branch, hanya Logout) --}}
                <li class="relative md:ml-4 group">
                    <button type="button"
                        class="flex items-center gap-2 w-full px-6 py-3 md:p-0 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        {{-- Menambahkan ikon dropdown dari miexed2 --}}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    {{-- Menggunakan group-hover:block untuk menampilkan dropdown saat hover --}}
                    <div
                        class="hidden absolute left-0 md:right-0 md:left-auto top-full mt-0 w-48 bg-white rounded-lg shadow-lg py-2 z-50 group-hover:block">
                        {{-- Tambahkan Tautan Riwayat Rujukan untuk Mitra/Dokter --}}
                        <a href="{{ route('mitra.rujukan.riwayat') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Riwayat Rujukan
                            </div>
                        </a>
                        {{-- Tambahkan Tautan Edit Profil untuk Mitra/Dokter --}}
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Edit Profil
                            </div>
                        </a>
                        {{-- Tautan Logout (Dari kedua branch) --}}
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-gray-800 hover:bg-primary hover:text-black">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </div>
                            </button>
                        </form>
                    </div>
                </li>
            @endif {{-- End if role --}}
        @endguest {{-- End guest/else --}}
    </ul>

    {{-- Tombol Hamburger Menu (untuk mobile, dari miexed2) --}}
    <div class="md:hidden">
        <button id="hamburger" class="text-gray-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
                <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu (dari miexed2, sesuaikan isinya) --}}
    <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 w-full bg-primary shadow-lg py-2 z-40">
        <ul class="flex flex-col font-medium">
            @guest
                {{-- Tautan Mobile untuk Pengguna Belum Login --}}
                <li><a href="{{ route('home') }}"
                        class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda</a></li>
                <li><a href="{{ route('tentang') }}"
                        class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Tentang</a></li>
                <li><a href="{{ route('reservasi') }}"
                        class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Reservasi</a></li>
                <li><a href="{{ route('login') }}" class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Akun</a>
                </li>
            @else
                {{-- Mobile Menu untuk User Sudah Login --}}
                {{-- Bagian Profil di Mobile Menu --}}
                <li class="px-6 py-3 flex items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                        alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                </li>
                <hr class="border-t border-gray-700 my-1"> {{-- Pembatas --}}

                {{-- Tautan Mobile berdasarkan Role --}}
                @if (Auth::user()->role === 'pasien' || Auth::user()->role === 'user')
                    {{-- Remove general Beranda link from mobile that might be causing duplication --}}
                    {{-- <li><a href="{{ route('home') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda</a></li> --}}
                    {{-- Add Beranda link for pasien/user (Mobile) --}}
                    <li><a href="{{ route('home') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda</a></li>
                    {{-- Add Tentang link for pasien/user (Mobile) --}}
                    <li><a href="{{ route('tentang') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Tentang</a></li>
                    {{-- Tautan Mobile untuk Pasien --}}
                    <li><a href="{{ route('reservasi') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Reservasi</a></li>
                    {{-- Remove Riwayat link from mobile navbar for pasien/user --}}
                    <li><a href="{{ route('riwayat') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Riwayat</a></li>
                    <li><a href="{{ route('profile.edit') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Edit Profil</a></li>
                @elseif(Auth::user()->role === 'mitra' || Auth::user()->role === 'dokter')
                    {{-- Tautan Mobile untuk Mitra/Dokter --}}
                    {{-- Explicitly add Beranda link for Mitra/Dokter (Mobile) --}}
                    <li><a href="{{ route('mitra.welcome') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda Mitra</a></li>
                    <li><a href="{{ route('mitra.rujukan') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Rujukan</a></li>
                    {{-- Tambahkan Riwayat Rujukan di sini untuk mobile mitra --}}
                    <li><a href="{{ route('mitra.rujukan.riwayat') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Riwayat Rujukan</a></li>
                    {{-- Tambahkan Tautan Edit Profil untuk Mitra/Dokter Mobile --}}
                    <li><a href="{{ route('profile.edit') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Edit Profil</a></li>
                @endif {{-- End of role-based links --}}

                {{-- Tautan Logout di Mobile Menu (selalu tampil untuk user login) --}}
                <hr class="border-t border-gray-700 my-1"> {{-- Pembatas --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-6 py-3 text-gray-800 hover:bg-yellow-700 hover:text-white">
                            Logout
                        </button>
                    </form>
                </li>
            @endguest {{-- End of else for logged-in users --}}
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    });
</script>
