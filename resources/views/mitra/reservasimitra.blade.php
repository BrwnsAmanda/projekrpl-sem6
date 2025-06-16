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
                    <button id="dropdownGenderButton" type="button"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-secondary">
                        <span id="genderText">Pilih</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownGender" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                        <ul class="py-2 text-sm text-gray-700">
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
                <label for="jadwal_pemeriksaan" class="block text-sm font-semibold mb-1">Jadwal Pemeriksaan</label>
                <input type="date" id="jadwal_pemeriksaan" name="jadwal_pemeriksaan"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-secondary"
                    required>
            </div>
            <!-- JENIS PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Jenis Pemeriksaan</label>
                <button id="dropdownJenisButton" type="button"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-primary">
                    <span id="jenisText">Pilih Jenis Pemeriksaan</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownJenis" class="z-10 hidden bg-white rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700" id="jenisOptions">
                        <!-- Options will be populated by JavaScript -->
                    </ul>
                </div>
                <input type="hidden" name="jenis_pemeriksaan" id="jenis_pemeriksaan">
            </div>
            <!-- DETAIL PEMERIKSAAN -->
            <div class="relative md:col-span-2">
                <label class="block font-semibold text-sm mb-1">Detail Pemeriksaan</label>
                <button id="dropdownDetailButton" type="button"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white shadow-sm text-left flex justify-between items-center focus:ring-2 focus:ring-primary">
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

            <div class="md:col-span-2 flex justify-center pt-4">
                <button type="submit"
                    class="bg-secondary hover:bg-secondary/80 text-white font-semibold px-6 py-3 rounded shadow mt-4">
                    Kirim Rujukan
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
            <h3 class="text-xl font-bold mb-2 text-gray-900">Konfirmasi Pengajuan Rujukan</h3>
            <p class="mb-6 text-gray-700">Apakah Anda sudah yakin untuk mengirim rujukan?</p>
            <div class="flex justify-center gap-4">
                <button type="submit" id="btn-konfirmasi-ya"
                    class="bg-primary text-black font-semibold px-6 py-2 rounded hover:bg-primary/80 transition">Ya,
                    Kirim</button>
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
        <h3 class="text-xl font-bold mb-2 text-gray-900">Rujukan Berhasil Dikirim</h3>
        <p class="mb-6 text-gray-700">Rujukan Anda telah berhasil dikirim.
        <button id="btn-notif-ok"
            class="bg-secondary text-white font-semibold px-8 py-2 rounded hover:bg-secondary/80 transition">OK</button>
    </div>
</div>


    @include('components.footer')

    <script>
        // Validasi ukuran file maksimal 2MB
        document.getElementById('rujukanForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('surat_rujukan');
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

        function selectGender(value, event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('genderText').innerText = value;
            document.getElementById('jenis_kelamin').value = value;
            document.getElementById('dropdownGender').classList.add('hidden');
        }

        function selectJenis(value, event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('jenisText').innerText = value;
            document.getElementById('jenis_pemeriksaan').value = value;
            document.getElementById('dropdownJenis').classList.add('hidden');
            updateDetail(); // Update detail options based on selected jenis
        }

        function selectDetail(value, event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('detailText').innerText = value;
            document.getElementById('detail_pemeriksaan').value = value;
            document.getElementById('dropdownDetail').classList.add('hidden');
        }

        // Fungsi untuk menampilkan preview file rujukan
        function previewFile(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const previewContainer = document.getElementById('preview-container');
            const fileNameSpan = document.getElementById('file-name');
            if (file) {
                fileNameSpan.textContent = file.name;
                previewContainer.classList.remove('hidden');
            } else {
                removePreview(); // Jika tidak ada file, sembunyikan preview
            }
        }

        // Fungsi untuk menghapus preview file rujukan
        function removePreview() {
            const fileInput = document.getElementById('surat_rujukan');
            const previewContainer = document.getElementById('preview-container');
            fileInput.value = ""; // Mengosongkan input file
            previewContainer.classList.add('hidden');
        }

        // Fungsi untuk validasi input hanya angka
        function validateNumberOnly(input, warningId) {
            const warning = document.getElementById(warningId);
            const cleaned = input.value.replace(/\D/g, '');
            if (input.value !== cleaned) {
                warning.classList.remove('hidden');
            } else {
                warning.classList.add('hidden');
            }
            input.value = cleaned;
        }

        // Inisialisasi dropdown dan logika modal setelah DOM siap
        document.addEventListener('DOMContentLoaded', function() {
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                const dropdowns = ['dropdownGender', 'dropdownJenis', 'dropdownDetail'];
                dropdowns.forEach(id => {
                    const dropdown = document.getElementById(id);
                    const button = document.getElementById(id + 'Button');
                    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });

            // Initialize dropdown click listeners
            const dropdownButtons = {
                'dropdownGenderButton': 'dropdownGender',
                'dropdownJenisButton': 'dropdownJenis',
                'dropdownDetailButton': 'dropdownDetail'
            };

            Object.entries(dropdownButtons).forEach(([buttonId, dropdownId]) => {
                const button = document.getElementById(buttonId);
                const dropdown = document.getElementById(dropdownId);

                if (button && dropdown) {
                    button.addEventListener('click', function(e) {
                        e.stopPropagation(); // Prevent document click from immediately closing
                        dropdown.classList.toggle('hidden');
                    });
                }
            });

            // Populate jenis pemeriksaan options
            const jenisOptionsData = [
                'Hematologi', 'Diabetes Melitus', 'Profil Lemak', 'Fungsi Hati', 'Fungsi Ginjal',
                'Urinalisa', 'Hepatitis', 'Imunologi', 'Infeksi Menular Seksual', 'Lainnya'
            ];
            const jenisList = document.getElementById('jenisOptions');
            if (jenisList) {
                jenisOptionsData.forEach(jenis => {
                    const li = document.createElement('li');
                    li.innerHTML =
                        `<a href="#" onclick="selectJenis('${jenis}', event)" class="block px-4 py-2 hover:bg-gray-100">${jenis}</a>`;
                    jenisList.appendChild(li);
                });
            }

            // Logika Modal
            const form = document.getElementById('rujukanForm'); // Corrected ID to rujukanForm
            if (!form) return; // Keluar jika form tidak ditemukan

            const modalKonfirmasi = document.getElementById('modal-konfirmasi');
            const modalNotif = document.getElementById('modal-notif');
            const btnKonfirmasiYa = document.getElementById('btn-konfirmasi-ya');
            const btnKonfirmasiBatal = document.getElementById('btn-konfirmasi-batal');
            const btnNotifOk = document.getElementById('btn-notif-ok');
            let submitConfirmed = false;

            // Mencegah submit form default, tampilkan modal konfirmasi
            form.addEventListener('submit', function(e) {
                if (!submitConfirmed) {
                    e.preventDefault();
                    modalKonfirmasi.classList.remove('hidden');
                }
            });

            // Tombol 'Ya, Submit' di modal konfirmasi
            btnKonfirmasiYa.addEventListener('click', function() {
                modalKonfirmasi.classList.add('hidden');
                modalNotif.classList.remove('hidden'); // Tampilkan modal notifikasi setelah konfirmasi
                // Tidak langsung submit di sini, submit dilakukan setelah klik OK di modal notifikasi
            });

            // Tombol 'Batal' di modal konfirmasi
            btnKonfirmasiBatal.addEventListener('click', function() {
                modalKonfirmasi.classList.add('hidden');
            });

            // Tombol 'OK' di modal notifikasi
            btnNotifOk.addEventListener('click', function() {
                modalNotif.classList.add('hidden');
                submitConfirmed = true; // Set flag agar submit tidak dicegat lagi
                form.submit(); // Lanjutkan submit form
            });
        });
    </script>
</body>

</html>
