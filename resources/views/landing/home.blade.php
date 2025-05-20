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

<<<<<<< HEAD
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] bg-cover bg-center text-white overflow-hidden"
        style="background-image: url('{{ asset('images/lab-background.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/50"></div>
        <div class="relative container mx-auto px-6 h-full flex flex-col items-start justify-center pt-32">
            <div class="max-w-3xl" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-loose">
                    Selamat Datang di Layanan Website<br>
                    <span class="text-primary">Laboratorium Prodifa</span>
                </h1>
                <p class="text-xl md:text-2xl italic mb-8 text-gray-200">"Accurate, Care, and Trust"</p>
                <a href="#contact"
                    class="inline-block bg-secondary hover:bg-secondary/90 text-white px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105">
                    Hubungi Kami
                </a>
            </div>
=======
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
>>>>>>> origin/main
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    <!-- About Section -->
    <section class="py-24 px-6 bg-white" id="about">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Tentang Laboratorium Prodifa</h2>
                    <div class="h-1 w-20 bg-primary mb-8"></div>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Laboratorium Klinik Prodifa merupakan laboratorium kesehatan masyarakat yang berkomitmen untuk
                        memberikan pelayanan pemeriksaan kesehatan yang akurat, cepat, dan terpercaya.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Terletak di Kabupaten Pangkajene dan Kepulauan, kami hadir sebagai mitra kesehatan yang siap
                        mendukung peningkatan kualitas hidup masyarakat melalui layanan diagnostik yang berkualitas.
                    </p>
                </div>
                <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                    <div
                        class="aspect-square w-full max-w-md mx-auto rounded-2xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
                        <img src="{{ asset('images/aboutlab.jpeg') }}" alt="Tentang Laboratorium"
                            class="object-cover w-full h-full">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary/20 rounded-full -z-10"></div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </section>

    <!-- Jadwal Praktek Dokter Section -->
    <section class="py-16 px-6 bg-[#FAF7ED]" id="jadwal-dokter">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Jadwal Praktek Dokter</h2>
            <p class="text-center text-gray-700 mb-10">
                Berikut jadwal praktek dokter umum dan spesialis di Laboratorium Klinik Prodifa.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex flex-col items-center bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up"
                    data-aos-delay="100">
                    <img src="{{ asset('images/dokterumum.jpg') }}" alt="Jadwal Praktek Dokter Umum"
                        class="rounded-xl shadow w-full max-w-xs mb-4">
                    <span class="font-semibold text-lg text-secondary">Dokter Umum</span>
                </div>
                <div class="flex flex-col items-center bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset('images/dokterspesialis.jpg') }}" alt="Jadwal Praktek Dokter Spesialis"
                        class="rounded-xl shadow w-full max-w-xs mb-4">
                    <span class="font-semibold text-lg text-secondary">Dokter Spesialis</span>
                </div>
=======

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
>>>>>>> origin/main
            </div>
        </div>
    </section>

    <!-- Akreditasi Paripurna Section -->
    <section class="py-16 px-6 bg-white" id="akreditasi">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Keterangan Akreditasi -->
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span>Akreditasi</span>
                    <span class="bg-secondary text-white text-sm font-bold px-3 py-1 rounded-full">PARIPURNA</span>
                </h2>
                <p class="text-lg text-gray-700 mb-4">
                    Laboratorium Klinik Prodifa telah terakreditasi <span
                        class="font-bold text-yellow-600">Paripurna</span> oleh Kementerian Kesehatan Republik
                    Indonesia.
                </p>
                <p class="text-gray-600">
                    Pengakuan ini membuktikan komitmen kami dalam memberikan pelayanan terbaik dan memenuhi standar mutu
                    fasilitas kesehatan.
                </p>
            </div>
            <!-- Gambar Sertifikat -->
            <div class="flex justify-center" data-aos="fade-left">
                <img src="{{ asset('images/sertifikat-akreditasi.jpg') }}" alt="Sertifikat Akreditasi Paripurna"
                    class="rounded-xl shadow-lg w-full max-w-md border-4 border-yellow-300">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 px-6 bg-[#FAF7ED]">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih Kami?</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-8"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami berkomitmen memberikan layanan terbaik dengan standar internasional
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl mb-4 text-primary">🔬</div>
                    <h3 class="text-xl font-semibold mb-3">Teknologi Modern</h3>
                    <p class="text-gray-600">Menggunakan peralatan canggih untuk hasil yang akurat</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl mb-4 text-primary">👨‍⚕️</div>
                    <h3 class="text-xl font-semibold mb-3">Tim Profesional</h3>
                    <p class="text-gray-600">Dilayani oleh tenaga ahli berpengalaman</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl mb-4 text-primary">⚡</div>
                    <h3 class="text-xl font-semibold mb-3">Hasil Cepat</h3>
                    <p class="text-gray-600">Proses pemeriksaan yang efisien dan tepat waktu</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="text-4xl mb-4 text-primary">💯</div>
                    <h3 class="text-xl font-semibold mb-3">Kualitas Terjamin</h3>
                    <p class="text-gray-600">Standar mutu tinggi untuk hasil yang terpercaya</p>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Apa Kata Mereka?</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg" data-aos="fade-right">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                            AS</div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Andi Saputra</h4>
                            <p class="text-sm text-gray-600">45 tahun</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Sudah beberapa kali periksa di Prodifa, selalu puas dengan ketepatan hasil dan kebersihan
                        tempatnya. Recommended!"
                    </p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg" data-aos="fade-left">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                            SR</div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Sarah Rahma</h4>
                            <p class="text-sm text-gray-600">32 tahun</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Pelayanan sangat ramah dan profesional. Hasil pemeriksaan cepat dan akurat. Sangat
                        merekomendasikan!"
                    </p>
                </div>
            </div>
=======

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
>>>>>>> origin/main
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 px-6 bg-gray-50" id="contact">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-8"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami siap membantu Anda dengan layanan terbaik
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl mb-4 text-primary">📞</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">082–189–145–943</h3>
                    <p class="text-gray-600">
                        Silakan hubungi nomor berikut untuk konsultasi lebih lanjut dengan kami Laboratorium Prodifa
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl mb-4 text-primary">✉️</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">labprodifa@gmail.com</h3>
                    <p class="text-gray-600">
                        Silakan kirimkan pesan anda melalui Gmail Laboratorium Prodifa
                    </p>
                </div>
            </div>
        </div>
    </section>

<<<<<<< HEAD
    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100
        });
    </script>
=======
    </div>
</section>

@include('components.footer')



>>>>>>> origin/main
</body>

</html>
