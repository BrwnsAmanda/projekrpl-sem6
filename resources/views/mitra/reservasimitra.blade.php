<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rujukan Pemeriksaan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>

<body class="bg-white text-gray-800 font-poppins">
    @include('components.navbar')

    <section class="bg-primary/20 py-10 rounded-b-3xl mb-8">
        <div class="max-w-3xl mx-auto text-center">
            <div class="flex justify-center mb-4">
                <div class="bg-white rounded-full p-4 shadow w-16 h-16 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Rujukan Pemeriksaan</h1>
            <p class="text-gray-700">Ajukan rujukan pemeriksaan dari fasilitas kesehatan atau dokter yang bekerja sama.
            </p>
        </div>
    </section>

    <div class="max-w-5xl mx-auto bg-white p-10 rounded-xl shadow-lg mb-16 border-l-8 border-primary">
        <h2 class="text-2xl font-bold mb-8 text-primary flex items-center gap-2">
            <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Formulir Rujukan Pemeriksaan
        </h2>
        <form action="{{ route('mitra.rujukan.store') }}" method="POST" enctype="multipart/form-data" id="rujukanForm"
            class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf

            <div>
                <label for="nama" class="block font-semibold text-sm mb-1">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label for="jenis_kelamin" class="block font-semibold text-sm mb-1">Jenis Kelamin</label>
                <div class="relative">
                    <button id="dropdownGenderButton" data-dropdown-toggle="dropdownGender"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-secondary"
                        type="button">
                        <span id="genderText">Pilih</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownGender" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownGenderButton">
                            <li><a href="#" onclick="selectGender('Laki-laki', event)"
                                    class="block px-4 py-2 hover:bg-gray-100">Laki-laki</a></li>
                            <li><a href="#" onclick="selectGender('Perempuan', event)"
                                    class="block px-4 py-2 hover:bg-gray-100">Perempuan</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="jenis_kelamin" id="jenis_kelamin">
                </div>
            </div>
            <div class="md:col-span-2">
                <label for="alamat" class="block font-semibold text-sm mb-1">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label for="nik" class="block font-semibold text-sm mb-1">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 focus:ring-2 focus:ring-primary"
                    oninput="validateNumberOnly(this, 'nikWarning')">
                <p id="nikWarning" class="text-red-600 text-sm hidden">Hanya boleh angka.</p>
            </div>
            <div>
                <label for="telepon" class="block font-semibold text-sm mb-1">Nomor Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" placeholder="Nomor WhatsApp aktif"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 focus:ring-2 focus:ring-primary"
                    oninput="validateNumberOnly(this, 'teleponWarning')">
                <p id="teleponWarning" class="text-red-600 text-sm hidden">Hanya boleh angka.</p>
            </div>
            <div>
                <label for="tanggal_lahir" class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-secondary"
                    required>
            </div>
            <div>
                <label for="tanggal_pemeriksaan" class="block text-sm font-semibold mb-1">Jadwal Pemeriksaan</label>
                <input type="date" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-secondary"
                    required>
            </div>
            <!-- JENIS PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Jenis Pemeriksaan</label>
                <button id="dropdownJenisButton" data-dropdown-toggle="dropdownJenis"
                    data-dropdown-placement="bottom-start"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-primary"
                    type="button">
                    <span id="jenisText">Pilih Jenis Pemeriksaan</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownJenis" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownJenisButton">
                        <li><a href="#" onclick="selectJenis('Hematologi', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Hematologi</a></li>
                        <li><a href="#" onclick="selectJenis('Diabetes Melitus', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Diabetes Melitus</a></li>
                        <li><a href="#" onclick="selectJenis('Profil Lemak', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Profil Lemak</a></li>
                        <li><a href="#" onclick="selectJenis('Fungsi Hati', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Fungsi Hati</a></li>
                        <li><a href="#" onclick="selectJenis('Fungsi Ginjal', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Fungsi Ginjal</a></li>
                        <li><a href="#" onclick="selectJenis('Urinalisa', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Urinalisa</a></li>
                        <li><a href="#" onclick="selectJenis('Hepatitis', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Hepatitis</a></li>
                        <li><a href="#" onclick="selectJenis('Imunologi', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Imunologi</a></li>
                        <li><a href="#" onclick="selectJenis('Infeksi Menular Seksual', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Infeksi Menular Seksual</a></li>
                        <li><a href="#" onclick="selectJenis('Lainnya', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Lainnya</a></li>
                    </ul>
                </div>
                <input type="hidden" name="jenis_pemeriksaan" id="jenis_pemeriksaan">
            </div>
            <!-- DETAIL PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Detail Pemeriksaan</label>
                <button id="dropdownDetailButton" data-dropdown-toggle="dropdownDetail"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-primary"
                    type="button">
                    <span id="detailText">Pilih detail pemeriksaan</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownDetail" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700 list-none" id="detailOptions"></ul>
                </div>
                <input type="hidden" name="detail_pemeriksaan" id="detail_pemeriksaan">
            </div>

            <div id="upload-rujukan" class="md:col-span-2">
                <label for="surat_rujukan" class="block text-sm font-semibold text-gray-700 mb-2">Unggah Surat
                    Rujukan</label>
                <input type="file" id="surat_rujukan" name="surat_rujukan"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 file:bg-secondary file:text-white"
                    accept=".pdf,image/*" onchange="previewFile(event)" />
                <div id="preview-container" class="mt-4 hidden">
                    <div id="preview-box" class="bg-gray-100 p-4 rounded-md flex items-center justify-between">
                        <span id="file-name" class="text-sm font-medium text-gray-700"></span>
                        <button type="button" onclick="removePreview()"
                            class="ml-4 text-sm text-red-600 hover:underline">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <label for="catatan_dokter" class="block font-semibold text-sm mb-1">Catatan Dokter (Opsional)</label>
                <textarea id="catatan_dokter" name="catatan_dokter" rows="3"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 focus:ring-2 focus:ring-primary"
                    placeholder="Tambahkan catatan dokter jika ada"></textarea>
            </div>

            <div class="md:col-span-2 text-center">
                <button type="submit"
                    class="bg-secondary hover:bg-secondary/80 text-white font-semibold px-6 py-3 rounded shadow mt-4">
                    Kirim Rujukan
                </button>
            </div>
        </form>
    </div>

    @include('components.footer')

    <script>
        // Validasi ukuran file maksimal 2MB
        document.getElementById('rujukanForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file_rujukan');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // MB
                if (fileSize > 2) {
                    alert('Ukuran file surat rujukan maksimal 2MB!');
                    e.preventDefault();
                }
            }
        });

        const pemeriksaanMap = {
            "Hematologi": ["Darah Rutin", "Laju Endap Darah (LED)", "Waktu Perdarahan (BT)", "Waktu Pembekuan (CT)",
                "Golongan Darah", "Golongan Darah + Rhesus"
            ],
            "Diabetes Melitus": ["Glukosa Darah Sewaktu", "Glukosa Darah Puasa", "Glukosa Darah 2 Jam PP", "TTGO",
                "HbA1c"
            ],
            "Profil Lemak": ["Cholesterol Total", "HDL Cholesterol", "LDL Cholesterol", "Trigliserida"],
            "Fungsi Hati": ["SGOT", "SGPT", "Bilirubin Total", "Bilirubin Direk", "Bilirubin Indirek", "Albumin"],
            "Fungsi Ginjal": ["Ureum", "Creatinin", "Asam Urat"],
            "Urinalisa": ["Urine Rutin", "Urine Lengkap + Sedimen"],
            "Hepatitis": ["HBsAg Kualitatif", "Anti HBs Kuantitatif", "Anti HCV Kualitatif"],
            "Imunologi": ["Widal", "Ns1", "IgG/IgM Dengue"],
            "Infeksi Menular Seksual": ["TPHA", "VDRL", "HIV", "Gram GO"],
            "Lainnya": ["Feces Rutin", "Analisa Sperma", "DDR (Malaria Apusan)", "BTA (Mikroskop)", "BTA Cuka-Cuki",
                "FT4", "TSH/TSH-S", "Ca 125", "Elektrolit", "B-Hcg", "Narkoba 1 Parameter", "Narkoba 3 Parameter",
                "Narkoba 6 Parameter"
            ]
        };

        function updateDetail() {
            const jenis = document.getElementById('jenis_pemeriksaan').value;
            const detailList = document.getElementById('detailOptions');
            const detailText = document.getElementById('detailText');
            const detailInput = document.getElementById('detail_pemeriksaan');

            detailList.innerHTML = ''; // Kosongkan dulu isinya
            detailText.innerText = 'Pilih detail pemeriksaan';
            detailInput.value = '';

            if (pemeriksaanMap[jenis]) {
                pemeriksaanMap[jenis].forEach(item => {
                    const li = document.createElement('li');
                    li.innerHTML =
                        `<a href="#" onclick="selectDetail('${item}', event)" class="block px-4 py-2 hover:bg-gray-100">${item}</a>`;
                    detailList.appendChild(li);
                });
            }
        }


        function selectGender(value) {
            event.preventDefault();
            document.getElementById('genderText').innerText = value;
            document.getElementById('jenis_kelamin').value = value;
            document.getElementById('dropdownGender').classList.add('hidden');
        }

        function selectJenis(value) {
            event.preventDefault();
            document.getElementById('jenisText').innerText = value;
            document.getElementById('jenis_pemeriksaan').value = value;

            updateDetail(); // jangan lupa panggil ini supaya detail diperbarui

            document.getElementById('dropdownJenis').classList.add('hidden');
        }


        function selectDetail(value) {
            event.preventDefault();
            document.getElementById('detailText').innerText = value;
            document.getElementById('detail_pemeriksaan').value = value;
            document.getElementById('dropdownDetail').classList.add('hidden');
        }
    </script>
</body>

</html>
