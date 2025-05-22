<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>

    <ul class="flex space-x-6 font-medium">
        @guest
            {{-- Tampil hanya jika BELUM login --}}
            <li><a href="{{ route('home') }}" class="hover:text-yellow-700">Beranda</a></li>
            <li><a href="{{ route('tentang') }}" class="hover:text-yellow-700">Tentang</a></li>
            <li><a href="{{ route('reservasi') }}" class="hover:text-yellow-700">Reservasi</a></li>
            <li><a href="{{ route('login') }}" class="hover:text-yellow-700">Akun</a></li>
        @else
            {{-- Menu khusus role saat SUDAH login --}}
            @if(Auth::user()->role === 'pasien')
                <li><a href="{{ route('reservasi') }}" class="hover:text-yellow-700">Reservasi</a></li>
                <li><a href="{{ route('riwayat') }}" class="hover:text-yellow-700">Riwayat</a></li>
                <li class="relative ml-4">
                    <button onclick="toggleDropdown()" class="flex items-center gap-2 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </button>

                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md border border-gray-200 py-2 z-50 hidden">
                        {{-- Khusus mitra, hanya tombol logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Keluar
                            </button>
                        </form>
                    </div>
                </li>


            {{-- Role: MITRA --}}
            @elseif(Auth::user()->role === 'mitra')
                <li><a href="{{ route('mitra.welcome') }}" class="hover:text-yellow-700">Beranda</a></li>
                <li><a href="{{ route('mitra.rujukan') }}" class="hover:text-yellow-700">Rujukan</a></li>

                {{-- Profil khusus mitra --}}
                <li class="relative ml-4">
                    <button onclick="toggleDropdown()" class="flex items-center gap-2 hover:text-yellow-700 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </button>

                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md border border-gray-200 py-2 z-50 hidden">
                        {{-- Khusus mitra, hanya tombol logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Keluar
                            </button>
                        </form>
                    </div>
                </li>


            @elseif(Auth::user()->role === 'admin')
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-700">Admin Panel</a></li>
                <li><a href="{{ route('admin.users') }}" class="hover:text-yellow-700">Kelola Pengguna</a></li>
            @endif
        </form>
    </div>
</li>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.toggle("hidden");
    }

    // Tutup dropdown kalau klik di luar
    window.addEventListener('click', function (e) {
        const dropdown = document.getElementById('dropdownMenu');
        const button = document.querySelector('button[onclick="toggleDropdown()"]');

        if (!dropdown.contains(e.target) && !button.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>


        @endguest
    </ul>
</nav>
