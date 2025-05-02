<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reservasi Pemeriksaan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</head>

<body class="bg-cream font-sans font-poppins">
    @include('components.navbar')

    <div class="max-w-5xl mx-auto px-6 py-8">
        <div class="bg-secondary text-center text-white p-6 rounded-lg space-y-2">
            <h2 class="text-lg font-bold">Reservasi Pemeriksaan</h2>
            <p>Masuk ke akun Anda untuk melihat riwayat pemeriksaan, hasil sebelumnya, dan kemudahan pengelolaan jadwal.
            </p>
            <div class="flex justify-center gap-4 pt-4">
                <a href="{{ route('login') }}"
                    class="bg-primary text-black px-6 py-2 rounded font-semibold hover:bg-yellow-100">Masuk</a>
                <a href="{{ route('register') }}"
                    class="bg-primary text-black px-6 py-2 rounded font-semibold hover:bg-yellow-100">Daftar</a>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md mb-16">
        <h2 class="text-2xl font-bold mb-6">Reservasi</h2>
        <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama" class="block font-semibold text-sm mb-1">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap"
                    class="w-full border border-gray-300 rounded-md px-4 py-2">
            </div>

            <div>
                <label for="jenis_kelamin" class="block font-semibold text-sm mb-1">Jenis Kelamin</label>
                <div class="relative">
                    <button id="dropdownGenderButton" data-dropdown-toggle="dropdownGender"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center"
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
                    <input type="hidden" name="jenis_kelamin" id="genderInput">
                </div>
            </div>

            <div class="md:col-span-2">
                <label for="alamat" class="block font-semibold text-sm mb-1">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap"
                    class="w-full border border-gray-300 rounded-md px-4 py-2">
            </div>

            <div>
                <label for="nik" class="block font-semibold text-sm mb-1">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan"
                    class="w-full border border-gray-300 rounded-md px-4 py-2"
                    oninput="validateNumberOnly(this, 'nikWarning')">
                <p id="nikWarning" class="text-red-600 text-sm hidden">Hanya boleh angka.</p>
            </div>

            <div>
                <label for="telepon" class="block font-semibold text-sm mb-1">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" placeholder="Nomor WhatsApp aktif"
                    class="w-full border border-gray-300 rounded-md px-4 py-2"
                    oninput="validateNumberOnly(this, 'teleponWarning')">
                <p id="teleponWarning" class="text-red-600 text-sm hidden">Hanya boleh angka.</p>
            </div>

            <div>
                <label for="tanggal_lahir" class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-secondary"
                    required>
            </div>

            <div>
                <label for="jadwal_pemeriksaan" class="block text-sm font-semibold mb-1">Jadwal Pemeriksaan</label>
                <input type="date" id="jadwal_pemeriksaan" name="jadwal_pemeriksaan"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-secondary"
                    required>
            </div>

            <!-- JENIS PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Jenis Pemeriksaan</label>
                <button id="dropdownJenisButton" data-dropdown-toggle="dropdownJenis"
                    data-dropdown-placement="bottom-start"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center"
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
                <input type="hidden" name="jenis" id="jenisInput">
            </div>

            <!-- DETAIL PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Detail Pemeriksaan</label>
                <button id="dropdownDetailButton" data-dropdown-toggle="dropdownDetail"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center"
                    type="button">
                    <span id="detailText">Pilih detail pemeriksaan</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownDetail" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700 list-none" id="detailOptions"></ul>
                </div>
                <input type="hidden" name="detail" id="detailInput">
            </div>

            <!-- RUJUKAN DOKTER -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Punya Rujukan Dokter?</label>
                <button id="dropdownRujukanButton" data-dropdown-toggle="dropdownRujukan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center"
                    type="button">
                    <span id="rujukanText">Pilih</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownRujukan" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700">
                        <li><a href="#" onclick="selectRujukan('Ya', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Ya</a></li>
                        <li><a href="#" onclick="selectRujukan('tidak', event)"
                                class="block px-4 py-2 hover:bg-gray-100">Tidak</a></li>
                    </ul>
                </div>
                <input type="hidden" name="rujukan" id="rujukanInput">
            </div>

            <div id="upload-rujukan" class="md:col-span-2 hidden">
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

            <div class="md:col-span-2 flex justify-center pt-4">
                <button type="submit"
                    class="bg-primary hover:bg-yellow-500 text-black font-bold px-8 py-2 rounded-md">
                    Ajukan Reservasi
                </button>
            </div>
        </form>
    </div>

    <script>
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
            const jenis = document.getElementById('jenisInput').value;
            const detailList = document.getElementById('detailOptions');
            const detailText = document.getElementById('detailText');
            const detailInput = document.getElementById('detailInput');

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
            document.getElementById('genderInput').value = value;
            document.getElementById('dropdownGender').classList.add('hidden');
        }

        function selectJenis(value) {
            event.preventDefault();
            document.getElementById('jenisText').innerText = value;
            document.getElementById('jenisInput').value = value;

            updateDetail(); // jangan lupa panggil ini supaya detail diperbarui

            document.getElementById('dropdownJenis').classList.add('hidden');
        }


        function selectDetail(value) {
            event.preventDefault();
            document.getElementById('detailText').innerText = value;
            document.getElementById('detailInput').value = value;
            document.getElementById('dropdownDetail').classList.add('hidden');
        }



        function selectRujukan(value) {
            event.preventDefault();
            document.getElementById('rujukanText').innerText = value;
            document.getElementById('rujukanInput').value = value;
            document.getElementById('dropdownRujukan').classList.add('hidden');


            const upload = document.getElementById('upload-rujukan');
            if (value === 'Ya') {
                upload.classList.remove('hidden');
            } else {
                upload.classList.add('hidden');
                removePreview();
            }
        }

        function previewFile(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const previewContainer = document.getElementById('preview-container');
            const fileNameSpan = document.getElementById('file-name');

            if (file) {
                fileNameSpan.textContent = file.name;
                previewContainer.classList.remove('hidden');
            } else {
                removePreview();
            }
        }

        function removePreview() {
            const fileInput = document.getElementById('surat_rujukan');
            const previewContainer = document.getElementById('preview-container');
            fileInput.value = "";
            previewContainer.classList.add('hidden');
        }
    </script>
    <script>
        function validateNumberOnly(input, warningId) {
            const warning = document.getElementById(warningId);
            const cleaned = input.value.replace(/\D/g, ''); // hapus semua non-digit
            if (input.value !== cleaned) {
                warning.classList.remove('hidden');
            } else {
                warning.classList.add('hidden');
            }
            input.value = cleaned;
        }
    </script>

    @include('components.footer')
</body>

</html>
