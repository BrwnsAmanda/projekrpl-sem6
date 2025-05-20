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


    <!-- Tentang Kami -->
    <section class="p-10 text-center">
        <h1 class="text-3xl font-bold mb-4">LABORATARORIUM PRODIFA</h1>
        <p class="max-w-4xl mx-auto mb-8">
            Laboratorium klinik prodifa adalah laboratorium kesehatan masyarakat yang melaksanakan pelayanan pemeriksaan kesehatan di bidang hematologi, kimia klinik, mikrobiologi dan pemeriksaan laboratorium lain yang berkaitan dengan kepentingan kesehatan masyarakat dalam upaya menunjang pencegahan penyakit dan peningkatan kualitas kesehatan masyarakat.
        </p>
        <div class="flex justify-center gap-6">
            <img src="/images/img1.jpg" class="w-48 rounded-md shadow">
            <img src="/images/img2.jpg" class="w-48 rounded-md shadow">
            <img src="/images/img3.jpg" class="w-48 rounded-md shadow">
        </div>
    </section>

    <!-- Visi & Misi -->
<section class="bg-primary p-20 text-black">
    <h2 class="text-2xl font-bold mb-4 ml-8">VISI</h2>
    <p class="mb-6 ml-8 leading-relaxed">
        Menjadi Laboratorium Kesehatan yang mandiri, berkualitas, akurat, dan terjangkau serta pusat rujukan fasilitas kesehatan di wilayah Pangkep dan sekitarnya
    </p>

    <h2 class="text-2xl font-bold mb-4 ml-8">MISI</h2>
    <ul class="list-decimal ml-8 space-y-3 leading-relaxed">
        <li>Memberikan pelayanan laboratorium kesehatan yang akurat, terpercaya, dengan harga terjangkau</li>
        <li>Menjaga kualitas hasil pemeriksaan secara Kontinyu dan berkesinambungan</li>
        <li>Menjalin kerjasama dan kolaborasi dengan fasilitas kesehatan di wilayah Pangkep dan sekitarnya</li>
    </ul>
</section>


    <!-- Layanan -->
    <section class="py-12 bg-white" id="layanan">
        <div class="max-w-7xl mx-auto px-4 text-center">
          <h2 class="text-2xl font-bold mb-8">LAYANAN KAMI</h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-left">

            <!-- Hematologi -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/kimia.png" alt="Hematologi" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Hematologi</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>Darah Rutin</li>
                <li>Laju Endap Darah (LED)</li>
                <li>Waktu Perdarahan (BT)</li>
                <li>Waktu Pembekuan (CT)</li>
                <li>Golongan Darah +Rhesus</li>
              </ul>
            </div>

            <!-- Urinalisa -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/mikrobiologi.png" alt="Urinalisa" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Urinalisa</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>Urine Rutin</li>
                <li>Urine Lengkap + Sedimen</li>
                <li>Plano Tes</li>
              </ul>
            </div>

            <!-- Imunologi -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/lainnya.png" alt="Imunologi" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Imunologi</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>HBsAg Kualitatif</li>
                <li>Anti HBs Kuantitatif</li>
                <li>Anti HCV Kualitatif</li>
                <li>Widal</li>
                <li>NS1</li>
                <li>IgG/IgM Dengue</li>
                <li>TPHA</li>
                <li>VDRL</li>
                <li>HIV</li>
              </ul>
            </div>

            <!-- Kimia Klinik -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/kimia.png" alt="Kimia Klinik" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Kimia Klinik</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>Diabetes Melitus</li>
                <li>Profil Lemak</li>
                <li>Faal Hati</li>
                <li>Faal Ginjal</li>
              </ul>
            </div>

            <!-- Parasitologi -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/parasit.png" alt="Parasitologi" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Parasitologi</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>Feces Rutin</li>
                <li>DDR Malaria</li>
              </ul>
            </div>

            <!-- Mikrobiologi -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/mikrobiologi.png" alt="Mikrobiologi" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Mikrobiologi dan Bakteriologi</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>BTA (Mikroskop)</li>
                <li>BTA Cuka-Cuki</li>
                <li>Gram GO</li>
              </ul>
            </div>

            <!-- Lainnya -->
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition col-span-1 sm:col-span-2 md:col-span-1">
              <div class="flex items-center gap-2 mb-2">
                <img src="/images/lainnya.png" alt="Lainnya" class="w-12 h-12">
                <h3 class="text-green-700 font-bold">Lainnya</h3>
              </div>
              <ul class="list-disc pl-5 text-sm">
                <li>Narkoba</li>
                <li>Analisis Sperma</li>
              </ul>
            </div>

          </div>
        </div>
      </section>


    <!-- Motto -->
    <section class="text-center p-10">
        <h2 class="text-xl font-semibold italic">Motto Kami</h2>
        <p class="text-lg font-bold mt-2">“Accurate, Care, and Trust”</p>
    </section>

@include('components.footer')



</body>
</html>
