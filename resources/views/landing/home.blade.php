<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium Prodifa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-poppins">


    @include('components.navbar')

   <!-- Hero Section -->
<section class="relative h-[80vh] bg-cover bg-center text-white" style="background-image: url('{{ asset('images/lab-background.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-start justify-center px-6 md:px-16">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Selamat Datang di Layanan Website Laboratorium Prodifa</h1>
        <p class="text-xl italic">"Accurate, Care, and Trust"</p>
    </div>
</section>

<!-- Tentang Laboratorium - 2 Kolom -->
<section class="py-16 px-6 bg-secondary">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

        <!-- Kolom Teks -->
        <div>
            <h2 class="text-3xl font-semibold text-black mb-4">Tentang Laboratorium Prodifa</h2>
            <p class="text-lg text-black leading-relaxed">
                Laboratorium Klinik Prodifa merupakan laboratorium kesehatan masyarakat yang berkomitmen untuk memberikan pelayanan pemeriksaan kesehatan yang akurat, cepat, dan terpercaya.
                Terletak di Kabupaten Pangkajene dan Kepulauan, kami hadir sebagai mitra kesehatan yang siap mendukung peningkatan kualitas hidup masyarakat melalui layanan diagnostik yang berkualitas.
            </p>
        </div>

        <!-- Kolom Gambar -->
        <div class="aspect-square w-full max-w-md mx-auto">
            <img src="{{ asset('images/aboutlab.jpeg') }}" alt="Tentang Laboratorium"
                 class="object-cover w-full h-full rounded-lg shadow-lg">
        </div>

    </div>
</section>

<!-- Testimoni + Keunggulan -->
<section class="py-16 px-6 bg-[#FAF7ED]">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <!-- Kolom Testimoni -->
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-black mb-6">Mengapa harus Laboratorium Prodifa?</h2>
            <div class="bg-primary p-6 rounded-xl shadow-md text-gray-800">
                <p class="italic text-lg mb-4">
                    "Sudah beberapa kali periksa di Prodifa, selalu puas dengan ketepatan hasil dan kebersihan tempatnya. Recommended!"
                </p>
                <p class="font-bold">– Andi Saputra, 45 tahun</p>
            </div>
        </div>

        <!-- Kolom Ikon Keunggulan -->
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col items-center bg-secondary text-white p-4 rounded-xl shadow-md">
                <div class="text-4xl mb-2">👍</div>
                <p class="text-sm font-medium">Kualitas Terbaik</p>
            </div>

            <div class="flex flex-col items-center bg-secondary text-white p-4 rounded-xl shadow-md">
                <div class="text-4xl mb-2">🧩</div>
                <p class="text-sm font-medium">Profesional</p>
            </div>

            <div class="flex flex-col items-center bg-secondary text-white p-4 rounded-xl shadow-md">
                <div class="text-4xl mb-2">🛡️</div>
                <p class="text-sm font-medium">Keamanan Terjamin</p>
            </div>

            <div class="flex flex-col items-center bg-secondary text-white p-4 rounded-xl shadow-md">
                <div class="text-4xl mb-2">💻</div>
                <p class="text-sm font-medium">Sistem Modern</p>
            </div>
        </div>

    </div>

<!-- Motto Kami -->
<section class="py-12 px-6 bg-[#FAF7ED] text-center">
    <h2 class="text-2xl md:text-3xl font-bold text-black mb-4">Motto Kami</h2>
    <p class="text-xl italic font-semibold">“<span class="italic">Accurate, Care, and Trust</span>”</p>
</section>
</section>

<!-- Kontak Informasi -->
<section class="py-16 px-6 bg-secondary">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Telepon -->
        <div class="bg-[#FAF7ED] rounded-xl p-6 text-center shadow-md">
            <div class="text-4xl mb-4">📞</div>
            <h3 class="text-2xl font-bold text-black mb-2">082–189–145–943</h3>
            <p class="text-sm text-gray-700">
                Silakan hubungi nomor berikut untuk<br>
                konsultasi lebih lanjut dengan kami<br>
                Laboratorium Prodifa
            </p>
        </div>

        <!-- Email -->
        <div class="bg-[#FAF7ED] rounded-xl p-6 text-center shadow-md">
            <div class="text-4xl mb-4">✉️</div>
            <h3 class="text-2xl font-bold text-black mb-2">labprodifa@gmail.com</h3>
            <p class="text-sm text-gray-700">
                Silakan kirimkan pesan anda melalui Gmail<br>
                Laboratorium Prodifa
            </p>
        </div>

    </div>
</section>

@include('components.footer')











</body>
</html>
