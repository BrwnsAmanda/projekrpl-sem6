<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>
    <ul class="flex space-x-6 font-medium">
        <li><a href="{{ route('home') }}" class="hover:text-yellow-700">Beranda</a></li>
<<<<<<< HEAD
        <li><a href="{{ route('tentang') }}" class="hover:text-yellow-700"> Tentang</a></li>
        <li><a href="{{ route('reservasi') }}" class="hover:text-yellow-700">Reservasi</a></li>
        @auth
            <li class="flex items-center gap-2 ml-4">
                <a href="{{ route('riwayat') }}" class="flex items-center gap-2 hover:text-yellow-700">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                        alt="Profile" class="w-7 h-7 rounded-full border-2 border-white shadow" />
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                </a>
            </li>
        @else
            <li><a href="{{ route('login') }}" class="hover:text-yellow-700">Akun</a></li>
        @endauth
=======
        <li><a href="#" class="hover:text-yellow-700">Tentang</a></li>
        <li><a href="{{ route('reservasi') }}" class="hover:text-yellow-700">Reservasi</a></li>
        <li><a href="{{ route('login') }}" class="hover:text-yellow-700">Akun</a></li>
>>>>>>> origin/main
    </ul>
</nav>
