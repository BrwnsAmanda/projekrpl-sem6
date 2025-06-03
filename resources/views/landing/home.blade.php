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
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    <!-- Tentang Laboratorium -->
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
    </section>

    <!-- Jadwal Praktek Dokter -->
    <section class="py-16 px-6 bg-[#FAF7ED]" id="jadwal-dokter">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Jadwal Praktek Dokter</h2>
            <p class="text-center text-gray-700 mb-10">
                Berikut jadwal praktek dokter umum dan spesialis di Laboratorium Klinik Prodifa.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex flex-col items-center bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up"
                    data-aos-delay="100">
                    <img src="{{ asset('images/dokterumum.jpg') }}" alt="Dokter Umum"
                        class="rounded-xl shadow w-full max-w-xs mb-4">
                    <span class="font-semibold text-lg text-secondary">Dokter Umum</span>
                </div>
                <div class="flex flex-col items-center bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset('images/dokterspesialis.jpg') }}" alt="Dokter Spesialis"
                        class="rounded-xl shadow w-full max-w-xs mb-4">
                    <span class="font-semibold text-lg text-secondary">Dokter Spesialis</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Akreditasi -->
    <section class="py-16 px-6 bg-white" id="akreditasi">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span>Akreditasi</span>
                    <span class="bg-secondary text-white text-sm font-bold px-3 py-1 rounded-full">PARIPURNA</span>
                </h2>
                <p class="text-lg text-gray-700 mb-4">
                    Laboratorium Klinik Prodifa telah terakreditasi <span
                        class="font-bold text-yellow-600">Paripurna</span>
                    oleh Kementerian Kesehatan Republik Indonesia.
                </p>
                <p class="text-gray-600">
                    Pengakuan ini membuktikan komitmen kami dalam memberikan pelayanan terbaik dan memenuhi standar mutu
                    fasilitas kesehatan.
                </p>
            </div>
            <div class="flex justify-center" data-aos="fade-left">
                <img src="{{ asset('images/sertifikat-akreditasi.jpg') }}" alt="Sertifikat Akreditasi Paripurna"
                    class="rounded-xl shadow-lg w-full max-w-md border-4 border-yellow-300">
            </div>
        </div>
    </section>

    <!-- Fitur & Keunggulan -->
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
                @php
                    $fitur = [
                        [
                            'emoji' => '🔬',
                            'title' => 'Teknologi Modern',
                            'desc' => 'Menggunakan peralatan canggih untuk hasil yang akurat',
                        ],
                        [
                            'emoji' => '👨‍⚕️',
                            'title' => 'Tim Profesional',
                            'desc' => 'Dilayani oleh tenaga ahli berpengalaman',
                        ],
                        [
                            'emoji' => '⚡',
                            'title' => 'Hasil Cepat',
                            'desc' => 'Proses pemeriksaan yang efisien dan tepat waktu',
                        ],
                        [
                            'emoji' => '💯',
                            'title' => 'Kualitas Terjamin',
                            'desc' => 'Standar mutu tinggi untuk hasil yang terpercaya',
                        ],
                    ];
                @endphp
                @foreach ($fitur as $f)
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                        data-aos="fade-up">
                        <div class="text-4xl mb-4 text-primary">{{ $f['emoji'] }}</div>
                        <h3 class="text-xl font-semibold mb-3">{{ $f['title'] }}</h3>
                        <p class="text-gray-600">{{ $f['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Apa Kata Mereka?</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                    $testi = [
                        [
                            'init' => 'AS',
                            'name' => 'Andi Saputra',
                            'age' => '45 tahun',
                            'text' => 'Selalu puas dengan ketepatan hasil dan kebersihan tempatnya. Recommended!',
                        ],
                        [
                            'init' => 'SR',
                            'name' => 'Sarah Rahma',
                            'age' => '32 tahun',
                            'text' => 'Pelayanan sangat ramah dan profesional. Hasil cepat dan akurat.',
                        ],
                    ];
                @endphp
                @foreach ($testi as $t)
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-lg" data-aos="fade-up">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                                {{ $t['init'] }}
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">{{ $t['name'] }}</h4>
                                <p class="text-sm text-gray-600">{{ $t['age'] }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic">"{{ $t['text'] }}"</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="py-24 px-6 bg-[#FAF7ED]" id="contact">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-8"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami siap membantu Anda dengan layanan terbaik</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up">
                    <div class="text-4xl mb-4 text-primary">📞</div>
                    <h3 class="text-2xl font-bold mb-4">082–189–145–943</h3>
                    <p class="text-gray-600">Silakan hubungi nomor berikut untuk konsultasi lebih lanjut.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up">
                    <div class="text-4xl mb-4 text-primary">✉️</div>
                    <h3 class="text-2xl font-bold mb-4">labprodifa@gmail.com</h3>
                    <p class="text-gray-600">Silakan kirimkan pesan anda melalui email kami.</p>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100
        });
    </script>
</body>

</html>
