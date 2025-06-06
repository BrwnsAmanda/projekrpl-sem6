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

    <!-- Hero About Section -->
    <section
        class="relative min-h-[350px] md:min-h-[400px] flex items-center justify-center bg-cover bg-center rounded-b-3xl overflow-hidden"
        style="background-image: url('/images/img1.jpg');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 text-center text-white px-4 py-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Laboratorium Prodifa</h1>
            <p class="max-w-2xl mx-auto text-lg font-medium">Laboratorium Klinik Prodifa adalah laboratorium kesehatan
                masyarakat yang melaksanakan pelayanan pemeriksaan kesehatan di bidang hematologi, kimia klinik,
                mikrobiologi, dan lainnya untuk menunjang pencegahan penyakit dan peningkatan kualitas kesehatan
                masyarakat.</p>
        </div>
    </section>

    <!-- Section Grid 2 Kolom: Gambar & Visi Misi -->
    <section class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
        <!-- Kiri: 2 Gambar -->
        <div class="flex flex-col gap-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-right">
                <img src="/images/img2.jpg" class="w-full h-56 object-cover border-b-4 border-primary">
            </div>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-right" data-aos-delay="100">
                <img src="/images/img3.jpg" class="w-full h-56 object-cover border-b-4 border-secondary">
            </div>
        </div>
        <!-- Kanan: Visi & Misi Card -->
        <div class="flex flex-col gap-8">
            <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-left">
                <h2 class="text-2xl font-bold mb-4 text-gray-900">Visi</h2>
                <p class="text-gray-900 mb-0">Menjadi Laboratorium Kesehatan yang mandiri, berkualitas, akurat, dan
                    terjangkau serta pusat rujukan fasilitas kesehatan di wilayah Pangkep dan sekitarnya.</p>
            </div>
            <div class="rounded-2xl shadow-lg p-8 bg-secondary/70" data-aos="fade-left" data-aos-delay="100">
                <h2 class="text-2xl font-bold mb-4 text-gray-900">Misi</h2>
                <ul class="list-disc pl-5 text-gray-900 space-y-4">
                    <li>Memberikan pelayanan laboratorium kesehatan yang akurat, terpercaya, dengan harga terjangkau
                    </li>
                    <li>Menjaga kualitas hasil pemeriksaan secara kontinyu dan berkesinambungan</li>
                    <li>Menjalin kerjasama dan kolaborasi dengan fasilitas kesehatan di wilayah Pangkep dan sekitarnya
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="py-16 px-6 bg-[#FAF7ED]" id="struktur-organisasi">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span>Struktur Organisasi</span>
                </h2>
                <p class="text-lg text-gray-700 mb-4">
                    Laboratorium Klinik Prodifa memiliki struktur organisasi yang jelas untuk memastikan operasional
                    yang efisien dan pelayanan berkualitas.
                </p>
                <p class="text-gray-600">
                    Setiap divisi bekerja sama secara profesional demi mencapai visi dan misi laboratorium.
                </p>
            </div>
            <div class="flex justify-center" data-aos="fade-left">
                <img src="{{ asset('images/struktur-organisasi.jpeg') }}" alt="Struktur Organisasi Laboratorium Prodifa"
                    class="rounded-xl shadow-lg w-full max-w-md border-4 border-primary">
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section class="py-20 px-6 bg-white" id="layanan">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-gray-900">LAYANAN KAMI</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Hematologi -->
                <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/kimia.png" alt="Hematologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Hematologi</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Darah Rutin</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Laju Endap Darah (LED)</span>
                            <span class="font-semibold text-gray-900">Rp20.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Waktu Perdarahan (BT)</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Waktu Pembekuan (CT)</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Golongan Darah</span>
                            <span class="font-semibold text-gray-900">Rp25.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Golongan Darah + Rhesus</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Urinalisa -->
                <div class="rounded-2xl shadow-lg p-8 bg-secondary/70" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/mikrobiologi.png" alt="Urinalisa" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Urinalisa</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Urine Rutin</span>
                            <span class="font-semibold text-gray-900">Rp70.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Urine Lengkap + Sedimen</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Imunologi -->
                <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/lainnya.png" alt="Imunologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Imunologi</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Widal</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Ns1</span>
                            <span class="font-semibold text-gray-900">Rp150.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>IgG/IgM Dengue</span>
                            <span class="font-semibold text-gray-900">Rp150.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Kimia Klinik -->
                <div class="rounded-2xl shadow-lg p-8 bg-secondary/70" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/kimia.png" alt="Kimia Klinik" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Diabetes Melitus</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Glukosa Darah Sewaktu</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Glukosa Darah Puasa</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Glukosa Darah 2 Jam PP</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>TTGO</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>HbA1c</span>
                            <span class="font-semibold text-gray-900">Rp350.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Profil Lemak -->
                <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/parasit.png" alt="Parasitologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Profil Lemak</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Cholesterol Total</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>HDL Cholesterol</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>LDL Cholesterol</span>
                            <span class="font-semibold text-gray-900">Rp50.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Trigliserida</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Fungsi Hati -->
                <div class="rounded-2xl shadow-lg p-8 bg-secondary/70" data-aos="fade-up" data-aos-delay="600">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/mikrobiologi.png" alt="Mikrobiologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-l font-bold text-gray-900">Fungsi Hati</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>SGOT</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>SGPT</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Bilirubin Total</span>
                            <span class="font-semibold text-gray-900">Rp50.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Bilirubin Direk</span>
                            <span class="font-semibold text-gray-900">Rp50.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Bilirubin Indirek</span>
                            <span class="font-semibold text-gray-900">Rp50.000</span>
                        </li>
                        <li class="flex justify-between items-center ">
                            <span>Albumin</span>
                            <span class="font-semibold text-gray-900">Rp50.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Fungsi Ginjal -->
                <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-up" data-aos-delay="700">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/parasit.png" alt="Parasitologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Fungsi Ginjal</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Ureum</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Creatinin</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Asam Urat</span>
                            <span class="font-semibold text-gray-900">Rp40.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Hepatitis -->
                <div class="rounded-2xl shadow-lg p-8 bg-secondary/70" data-aos="fade-up" data-aos-delay="800">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/mikrobiologi.png" alt="Mikrobiologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Hepatitis</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>HBsAg Kualitatif</span>
                            <span class="font-semibold text-gray-900">Rp80.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Anti HBs Kuantitatif</span>
                            <span class="font-semibold text-gray-900">Rp350.000</span>
                        </li>
                        <li class="flex justify-between items-center ">
                            <span>Anti HCV Kualitatif</span>
                            <span class="font-semibold text-gray-900">Rp250.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Infeksi Menular Seksual -->
                <div class="rounded-2xl shadow-lg p-8 bg-primary/80" data-aos="fade-up" data-aos-delay="900">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/parasit.png" alt="Parasitologi" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Infeksi Menular Seksual </h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>TPHA</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>VDRL</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>HIV</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Gram GO</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                    </ul>
                </div>
                <!-- Lainnya -->
                <div class="rounded-2xl shadow-lg p-8 bg-secondary/70 col-span-1 sm:col-span-2 md:col-span-1"
                    data-aos="fade-up" data-aos-delay="1000">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center mr-4">
                            <img src="/images/lainnya.png" alt="Lainnya" class="w-8 h-8">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Lainnya</h3>
                    </div>
                    <ul class="mt-4 space-y-2">
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Feces Rutin</span>
                            <span class="font-semibold text-gray-900">Rp30.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Analisa Sperma</span>
                            <span class="font-semibold text-gray-900">Rp150.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>DDR (Malaria Apusan)</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>BTA (Mikroskop)</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>BTA Cuka-Cuki</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>FT4</span>
                            <span class="font-semibold text-gray-900">Rp350.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>TSH/TSH-S</span>
                            <span class="font-semibold text-gray-900">Rp350.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Ca 125</span>
                            <span class="font-semibold text-gray-900">Rp600.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Elektrolit</span>
                            <span class="font-semibold text-gray-900">Rp350.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>B-Hcg</span>
                            <span class="font-semibold text-gray-900">Rp750.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Narkoba 1 Parameter</span>
                            <span class="font-semibold text-gray-900">Rp100.000</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-600 pb-1">
                            <span>Narkoba 3 Parameter</span>
                            <span class="font-semibold text-gray-900">Rp210.000</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Narkoba 6 Parameter</span>
                            <span class="font-semibold text-gray-900">Rp300.000</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Motto -->
    <section class="text-center py-14 bg-white">
        <h2 class="text-xl font-semibold italic text-secondary">Motto Kami</h2>
        <div class="h-1 w-16 bg-primary mx-auto my-3"></div>
        <p class="text-2xl font-bold mt-2 text-gray-900">“Accurate, Care, and Trust”</p>
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
