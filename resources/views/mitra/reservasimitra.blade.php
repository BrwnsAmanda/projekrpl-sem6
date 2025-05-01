<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium Prodifa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-cream text-gray-800 font-poppins min-h-screen flex flex-col">

    @include('components.navbar')

    <section class="bg-[#D4E9D6] py-10">
        <div class="max-w-4xl mx-auto px-4 text-center relative">
            <a href="{{ route('home') }}" class="absolute top-4 left-4 text-gray-600 hover:text-secondary flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-sm">Kembali</span>
            </a>
            <h2 class="text-xl font-bold">Rujukan Pasien</h2>
            <p class="text-sm text-gray-700 mt-2">
                Rujukan Pasien ke Laboratorium adalah layanan yang digunakan untuk mengarahkan pasien melakukan pemeriksaan medis lebih lanjut di laboratorium.
                <br> Melalui sistem ini, pasien mendapatkan surat rujukan resmi dari tenaga medis agar dapat melakukan tes atau analisis sesuai kebutuhan diagnosis.
            </p>
        </div>
    </section>

    <section class="bg-[#FAF6EB] py-12">
        <div class="max-w-5xl mx-auto px-6">
            <h3 class="text-lg font-bold mb-6">Rujukan Pasien</h3>
            <p class="text-sm font-semibold mb-6">DATA DIRI</p>

            <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @csrf

                <div>
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" placeholder="Nama Lengkap ( ANDI RIAN )" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">Alamat</label>
                    <input type="text" placeholder="Alamat Lengkap" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">No. NIK</label>
                    <input type="text" placeholder="Nomor Induk Kependudukan" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">Tanggal Lahir</label>
                    <input type="date" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">Jenis Kelamin</label>
                    <select class="w-full border rounded-md px-4 py-2">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm mb-1">Penjadwalan Pemeriksaan</label>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="date" class="border rounded-md px-4 py-2" />
                        <input type="time" class="border rounded-md px-4 py-2" />
                    </div>
                </div>


                <div>
                    <label class="block text-sm mb-1">Jenis Pemeriksaan</label>
                    <input type="text" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">No Telepon</label>
                    <input type="text" placeholder="+6281343059039" class="w-full border rounded-md px-4 py-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">Upload Surat Rujukan</label>
                    <input type="file" class="mt-2" />
                </div>

                <div>
                    <label class="block text-sm mb-1">Catatan Dokter (Opsional)</label>
                    <textarea rows="4" class="w-full border rounded-md px-4 py-2"></textarea>
                </div>

                <div>
                    <div class="col-span-2 flex justify-center mt-4 relative z-10">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 shadow-md z-10">
                            Kirim
                        </button>
                    </div>


                </div>
            </form>
        </div>
    </section>

    <section class="text-center py-10 bg-[#FAF6EB]">
        <h4 class="font-bold text-lg">Motto Kami</h4>
        <p class="italic font-semibold mt-2 text-lg">“Accurate, Care, and Trust”</p>
    </section>


    @include('components.footer')

</body>
</html>
