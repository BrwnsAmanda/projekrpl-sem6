<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>
    <ul id="navbar-menu" class="hidden md:flex md:items-center md:space-x-6 font-medium">
        @guest
            {{-- Tautan untuk Pengguna Belum Login --}}
            <li><a href="{{ route('home') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
            <li><a href="{{ route('tentang') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Tentang</a></li>
            <li><a href="{{ route('reservasi') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Reservasi</a></li>
            <li><a href="{{ route('login') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Akun</a></li>
        @else
            {{-- User Sudah Login (@auth) --}}
            @if (Auth::user()->role === 'dokter')
                {{-- Tautan untuk Mitra (Dokter) --}}
                <li><a href="{{ url('/mitra') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
                {{-- Link ke halaman welcome mitra --}}
                <li><a href="{{ url('/mitra/rujukan') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Rujukan</a>
                </li> {{-- Link ke halaman rujukan/reservasi mitra --}}

                {{-- Bagian profil dropdown untuk Dokter (hanya Logout) --}}
                <li class="relative md:ml-4 group">
                    <button id="profile-toggle" type="button"
                        class="flex items-center gap-2 w-full px-6 py-3 md:p-0 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown"
                        class="hidden absolute left-0 top-full mt-0 w-48 bg-white rounded-lg shadow-lg py-2 z-50 group-hover:block">
                        {{-- Tautan Logout (untuk Dokter) --}}
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
            @else
                {{-- Tautan untuk Admin & Pengguna Biasa --}}
                <li><a href="{{ route('home') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Beranda</a></li>
                <li><a href="{{ route('tentang') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Tentang</a></li>
                <li><a href="{{ route('reservasi') }}" class="block px-6 py-3 md:p-0 hover:text-yellow-700">Reservasi</a>
                </li>

                {{-- Bagian profil dropdown untuk Admin & Pengguna Biasa --}}
                <li class="relative md:ml-4 group">
                    <button id="profile-toggle" type="button"
                        class="flex items-center gap-2 w-full px-6 py-3 md:p-0 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown"
                        class="hidden absolute left-0 top-full mt-0 w-48 bg-white rounded-lg shadow-lg py-2 z-50 group-hover:block">
                        {{-- Tautan Riwayat & Edit Profil --}}
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
                        {{-- Tautan Logout --}}
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
            @endif
        @endguest
    </ul>
</nav>
