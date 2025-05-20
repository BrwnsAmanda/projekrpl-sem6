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

    <!-- Hero Section -->
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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Reservasi Pemeriksaan</h1>
            <p class="text-gray-700">Reservasi mudah, cepat, dan aman di Laboratorium Klinik Prodifa.</p>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-6 py-8">
        <div class="bg-white text-center p-6 rounded-xl shadow-lg space-y-2 border-l-8 border-secondary">
            <div class="flex justify-center mb-2">
                <div class="bg-secondary rounded-full p-3 shadow w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <h2 class="text-lg font-bold text-secondary">Reservasi Pemeriksaan</h2>
            @guest
                <p class="text-gray-700">Masuk ke akun Anda untuk melihat riwayat pemeriksaan, hasil sebelumnya, dan
                    kemudahan pengelolaan jadwal.</p>
                <div class="flex justify-center gap-4 pt-4">
                    <a href="{{ route('login') }}"
                        class="bg-primary text-black px-6 py-2 rounded font-semibold hover:bg-yellow-100 shadow">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-primary text-black px-6 py-2 rounded font-semibold hover:bg-yellow-100 shadow">Daftar</a>
                </div>
            @endguest
        </div>
    </div>

    <div class="max-w-5xl mx-auto bg-white p-10 rounded-xl shadow-lg mb-16 border-l-8 border-primary">
        <h2 class="text-2xl font-bold mb-8 text-primary flex items-center gap-2">
            <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Formulir Reservasi
        </h2>
        <form class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
                    <input type="hidden" name="jenis_kelamin" id="genderInput">
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
                <input type="text" id="telepon" name="telepon" placeholder="Nomor WhatsApp aktif"
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
                <label for="jadwal_pemeriksaan" class="block text-sm font-semibold mb-1">Jadwal Pemeriksaan</label>
                <input type="date" id="jadwal_pemeriksaan" name="jadwal_pemeriksaan"
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
                <input type="hidden" name="jenis" id="jenisInput">
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
                <input type="hidden" name="detail" id="detailInput">
            </div>
            <!-- RUJUKAN DOKTER -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Punya Rujukan Dokter?</label>
                <button id="dropdownRujukanButton" data-dropdown-toggle="dropdownRujukan"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-primary"
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
                    class="bg-primary hover:bg-yellow-500 text-black font-bold px-8 py-3 rounded-lg shadow-lg transition-all duration-300">
                    Ajukan Reservasi
                </button>
            </div>
        </form>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="modal-konfirmasi" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center">
            <div class="flex justify-center mb-4">
                <div class="bg-primary/20 rounded-full p-3">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            fill="none" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold mb-2 text-gray-900">Konfirmasi Pengajuan</h3>
            <p class="mb-6 text-gray-700">Apakah Anda sudah yakin untuk submit reservasi?</p>
            <div class="flex justify-center gap-4">
                <button id="btn-konfirmasi-ya"
                    class="bg-primary text-black font-semibold px-6 py-2 rounded hover:bg-primary/80 transition">Ya,
                    Submit</button>
                <button id="btn-konfirmasi-batal"
                    class="bg-gray-200 text-gray-700 font-semibold px-6 py-2 rounded hover:bg-gray-300 transition">Batal</button>
            </div>
        </div>
    </div>
    <!-- Modal Notifikasi -->
    <div id="modal-notif" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center">
            <div class="flex justify-center mb-4">
                <div class="bg-secondary/20 rounded-full p-3">
                    <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01" />
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            fill="none" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold mb-2 text-gray-900">Reservasi Diajukan</h3>
            <p class="mb-6 text-gray-700">Berkas Anda sedang diverifikasi.<br>Silakan tunggu admin menghubungi Anda.
            </p>
            <button id="btn-notif-ok"
                class="bg-secondary text-white font-semibold px-8 py-2 rounded hover:bg-secondary/80 transition">OK</button>
        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (!form) return;
            const modalKonfirmasi = document.getElementById('modal-konfirmasi');
            const modalNotif = document.getElementById('modal-notif');
            const btnKonfirmasiYa = document.getElementById('btn-konfirmasi-ya');
            const btnKonfirmasiBatal = document.getElementById('btn-konfirmasi-batal');
            const btnNotifOk = document.getElementById('btn-notif-ok');
            let submitConfirmed = false;

            form.addEventListener('submit', function(e) {
                if (!submitConfirmed) {
                    e.preventDefault();
                    modalKonfirmasi.classList.remove('hidden');
                }
            });

            btnKonfirmasiYa.addEventListener('click', function() {
                modalKonfirmasi.classList.add('hidden');
                modalNotif.classList.remove('hidden');
            });
            btnKonfirmasiBatal.addEventListener('click', function() {
                modalKonfirmasi.classList.add('hidden');
            });
            btnNotifOk.addEventListener('click', function() {
                modalNotif.classList.add('hidden');
                submitConfirmed = true;
                form.submit();
            });
        });
    </script>

    @include('components.footer')
</body>

</html>
