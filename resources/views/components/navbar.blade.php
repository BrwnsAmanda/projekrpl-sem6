<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>
    {{-- Menu untuk Desktop --}}
    <ul class="hidden md:flex md:items-center md:space-x-6 font-medium">
        {{-- Tautan yang terlihat oleh SEMUA Pengguna (Tamu & Login) --}}
        <li><a href="{{ route('home') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
        <li><a href="{{ route('tentang') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Tentang</a></li>
        <li><a href="{{ route('reservasi') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Reservasi</a></li>

        @guest
            {{-- Tautan yang hanya terlihat oleh Pengguna TAMU --}}
            <li><a href="{{ route('login') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Akun</a></li>
        @else
            {{-- Tautan khusus role (jika ada) di luar dropdown profil --}}
            @if (Auth::user()->role === 'pasien')
                <li><a href="{{ route('riwayat') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Riwayat</a></li>
            @elseif (Auth::user()->role === 'mitra' || Auth::user()->role === 'dokter')
                <li><a href="{{ route('mitra.welcome') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda
                        Mitra</a></li>
                <li><a href="{{ route('mitra.rujukan') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Rujukan</a>
                </li>
            @elseif (Auth::user()->role === 'admin')
                <li><a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Admin
                        Panel</a></li>
                <li><a href="{{ route('admin.users') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Kelola
                        Pengguna</a></li>
            @endif

            {{-- Bagian profil dropdown untuk SEMUA Pengguna LOGIN --}}
            <li class="relative md:ml-4 group">
                <button type="button"
                    class="flex items-center gap-2 w-full px-6 py-3 md:p-0 hover:text-yellow-700 focus:outline-none">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                        alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div
                    class="hidden absolute left-0 md:right-0 md:left-auto top-full mt-0 w-48 bg-white rounded-lg shadow-lg py-2 z-50 group-hover:block">
                    {{-- Tautan Riwayat Pemeriksaan (Muncul untuk semua user login) --}}
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
                    {{-- Tautan Edit Profil (Muncul untuk semua user login) --}}
                    {{-- Asumsikan route profile.edit ada dan relevan untuk semua user login --}}
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
                    {{-- Tautan Logout (Muncul untuk semua user login) --}}
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
        @endguest {{-- End guest/else --}}
    </ul>

    {{-- Tombol Hamburger Menu (untuk mobile) --}}
    <div class="md:hidden">
        <button id="hamburger" class="text-gray-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
                <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 w-full bg-primary shadow-lg py-2 z-40">
        <ul class="flex flex-col font-medium">
            {{-- Tautan Mobile yang terlihat oleh SEMUA Pengguna (Tamu & Login) --}}
            <li><a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda</a>
            </li>
            <li><a href="{{ route('tentang') }}"
                    class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Tentang</a></li>
            <li><a href="{{ route('reservasi') }}"
                    class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Reservasi</a></li>

            @guest
                {{-- Tautan Mobile yang hanya terlihat oleh Pengguna TAMU --}}
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

                {{-- Tautan khusus role di mobile menu --}}
                <li><a href="{{ route('riwayat') }}"
                        class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Riwayat</a></li>

                @if (Auth::user()->role === 'mitra' || Auth::user()->role === 'dokter')
                    <li><a href="{{ route('mitra.welcome') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Beranda Mitra</a></li>
                    <li><a href="{{ route('mitra.rujukan') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Rujukan</a></li>
                @elseif(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Admin Panel</a></li>
                    <li><a href="{{ route('admin.users') }}"
                            class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Kelola Pengguna</a></li>
                @endif

                {{-- Tautan Profil & Logout di mobile menu (selalu tampil untuk user login) --}}
                <li><a href="{{ route('profile.edit') }}"
                        class="block px-6 py-3 hover:bg-yellow-700 hover:text-white">Edit Profil</a></li>
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
            @endguest
        </ul>
    </div>
</nav>

{{-- Script untuk toggle mobile menu --}}
<script>
    document.getElementById('hamburger').onclick = function() {
        // Menggunakan ID dari struktur ul desktop dan div mobile menu
        const navbarMenu = document.querySelector('nav ul.hidden.md\\:flex'); // Pilih ul desktop
        const mobileMenu = document.getElementById('mobile-menu'); // Pilih div mobile

        // Toggle hidden class pada mobile menu
        mobileMenu.classList.toggle('hidden');

        // Toggle ikon hamburger/close
        document.getElementById('hamburger-icon').classList.toggle('hidden');
        document.getElementById('close-icon').classList.toggle('hidden');

        // Optional: Pastikan desktop menu tersembunyi di mobile view
        if (!navbarMenu.classList.contains('hidden') && window.innerWidth < 768) {
            navbarMenu.classList.add('hidden');
        }
    }

    // Close mobile menu when clicking outside
    window.addEventListener('click', function(e) {
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerButton = document.getElementById('hamburger');

        // Check if the click was outside the mobile menu AND the hamburger button
        if (!mobileMenu.contains(e.target) && !hamburgerButton.contains(e.target)) {
            // Only hide if mobile menu is currently visible
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                // Reset ikon hamburger
                document.getElementById('hamburger-icon').classList.remove('hidden');
                document.getElementById('close-icon').classList.add('hidden');
                // Optional: Pastikan desktop menu tetap hidden di mobile setelah klik luar
                const navbarMenu = document.querySelector('nav ul.hidden.md\\:flex');
                if (window.innerWidth < 768) {
                    navbarMenu.classList.add('hidden');
                }
            }
        }
    });

    // Optional: Tutup mobile menu saat resize ke desktop
    window.addEventListener('resize', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const navbarMenu = document.querySelector('nav ul.hidden.md\\:flex');
        if (window.innerWidth >= 768) {
            mobileMenu.classList.add('hidden');
            // Pastikan desktop menu tampil saat resize ke desktop
            navbarMenu.classList.remove('hidden');
            // Reset ikon hamburger
            document.getElementById('hamburger-icon').classList.remove('hidden');
            document.getElementById('close-icon').classList.add('hidden');
        } else {
            // Pastikan desktop menu hidden di mobile view
            navbarMenu.classList.add('hidden');
        }
    });
</script>
