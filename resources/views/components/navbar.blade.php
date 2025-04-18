<nav class="bg-primary px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('logo.png') }}" alt="Logo Prodifa" class="h-8 w-8">
        <span class="font-bold text-xl">LABORATORIUM PRODIFA</span>
    </div>
    <ul class="flex space-x-6 font-medium">
        <li><a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a></li>
        <li><a href="#" class="hover:text-blue-700">Tentang</a></li>
        <li><a href="#" class="hover:text-blue-700">Reservasi</a></li>
        <li><a href="{{ route('login') }}" class="hover:text-blue-700">Akun</a></li>
    </ul>
</nav>
