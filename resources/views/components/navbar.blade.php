<nav class="sticky top-0 z-50 bg-primary font-poppins px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Prodifa" class="h-10 w-10 object-cover rounded-full">
        <span class="font-bold text-xl whitespace-nowrap">LABORATORIUM PRODIFA</span>
    </div>
    <ul class="flex space-x-6 font-medium">
        <li><a href="{{ route('home') }}" class="hover:text-yellow-700">Beranda</a></li>
        <li><a href="#" class="hover:text-yellow-700">Tentang</a></li>
        <li><a href="{{ route('reservasi') }}" class="hover:text-yellow-700">Reservasi</a></li>
        <li><a href="{{ route('login') }}" class="hover:text-yellow-700">Akun</a></li>
    </ul>
</nav>
