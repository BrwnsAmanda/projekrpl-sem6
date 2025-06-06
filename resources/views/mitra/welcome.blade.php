<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium Prodifa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800 font-poppins">

    @include('components.navbar')

    {{-- Hero Section with Background Image and Overlay --}}
    {{-- Menggunakan min-h-screen untuk tinggi penuh dan flex items-center justify-center --}}
    <div class="relative bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('images/gambarmitra.jpg') }}'); min-height: 80vh;">
        {{-- Overlay Hitam Transparan --}}
        <div class="absolute inset-0 bg-black opacity-50"></div>

        {{-- Konten Sambutan di Atas Overlay --}}
        {{-- Menambahkan text-white dan data-aos pada div container --}}
        <div class="relative z-10 p-8 text-left text-white" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Selamat Datang, Mitra Laboratorium Prodifa!</h1>
            {{-- Menghapus text-white dan data-aos dari h1 --}}
            <p class="text-base md:text-lg max-w-2xl"> {{-- Menghapus text-white dan data-aos dari p, menghapus mx-auto agar rata kiri --}}
                Kolaborasi dengan Anda adalah kehormatan bagi kami.<br> Mari terus bersinergi memberikan layanan
                kesehatan terbaik bagi masyarakat.
            </p>
        </div>
    </div>

    {{-- Konten utama lainnya bisa ditambahkan di sini di bawah hero section jika ada --}}
    {{-- <main class="..."></main> --}}

    @include('components.footer')

    {{-- Pastikan AOS.init() ada di app.js atau di sini --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100
        });
    </script>

</body>

</html>
