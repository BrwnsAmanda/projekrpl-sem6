<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reservasi Pemeriksaan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!-- Tambahkan script di head untuk memastikan dimuat lebih awal -->
    <script>
        // Definisikan variabel global untuk modal
        let modalKonfirmasi, modalNotif, btnKonfirmasiYa, btnKonfirmasiBatal, btnNotifOk;

        // Fungsi untuk inisialisasi modal
        function initModals() {
            let submitConfirmed = false;
            modalKonfirmasi = document.getElementById('modal-konfirmasi');
            modalNotif = document.getElementById('modal-notif');
            btnKonfirmasiYa = document.getElementById('btn-konfirmasi-ya');
            btnKonfirmasiBatal = document.getElementById('btn-konfirmasi-batal');
            btnNotifOk = document.getElementById('btn-notif-ok');

            // Event listeners untuk tombol modal
            if (btnKonfirmasiYa) {
                btnKonfirmasiYa.addEventListener('click', function() {
                    modalKonfirmasi.classList.add('hidden');
                    modalNotif.classList.remove('hidden');
                });
            }

            if (btnKonfirmasiBatal) {
                btnKonfirmasiBatal.addEventListener('click', function() {
                    modalKonfirmasi.classList.add('hidden');
                });
            }

            if (btnNotifOk) {
                btnNotifOk.addEventListener('click', function() {
                    modalNotif.classList.add('hidden');
                    submitConfirmed = true;
                    document.querySelector('form').submit();
                });
            }
        }

        // Fungsi untuk menangani submit form
        function handleFormSubmit(e) {
            let submitConfirmed = false;
            if (!submitConfirmed) {
                e.preventDefault();
                if (modalKonfirmasi) {
                    modalKonfirmasi.classList.remove('hidden');
                }
            }
        }
    </script>
</head>

<body class="bg-cream font-sans font-poppins">
    @include('components.navbar')

    <div class="max-w-5xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6">Riwayat Pemeriksaan</h2>

        @if (!$hasData)
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-primary/20 rounded-full p-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Belum Ada Data Pemeriksaan</h3>
                <p class="text-gray-600 mb-6">Anda belum memiliki riwayat pemeriksaan. Silakan lakukan reservasi untuk
                    melihat riwayat pemeriksaan Anda.</p>
                <a href="{{ route('reservasi') }}"
                    class="inline-block bg-primary text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-100 transition">
                    Buat Reservasi
                </a>
            </div>
        @else
            <div class="grid gap-6">
                @foreach ($riwayats as $riwayat)
                    <div class="bg-white border-2 border-primary rounded-xl shadow p-6 flex flex-col gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- Kiri: Informasi Pasien --}}
                            <div>
                                <div class="mb-2"><span class="font-semibold">Nama</span> : {{ $riwayat->nama }}</div>
                                <div class="mb-2"><span class="font-semibold">Tanggal Lahir</span> :
                                    {{ $riwayat->tanggal_lahir }}</div>
                                <div class="mb-2"><span class="font-semibold">Jenis Kelamin</span> :
                                    {{ $riwayat->jenis_kelamin }}</div>
                                <div class="mb-2"><span class="font-semibold">Alamat</span> : {{ $riwayat->alamat }}
                                </div>
                                <div class="mb-2"><span class="font-semibold">No. NIK</span> : {{ $riwayat->nik }}
                                </div>
                                <div class="mb-2"><span class="font-semibold">No. Telephone</span> :
                                    {{ $riwayat->telepon }}</div>
                                <div class="mt-4 font-semibold">Pemeriksaan: {{ $riwayat->jenis_pemeriksaan }}</div>
                                <div class="text-sm text-gray-600">Tanggal: {{ $riwayat->jadwal_pemeriksaan }}</div>
                            </div>
                            {{-- Kanan: Tombol Aksi --}}
                            <div class="flex flex-col items-end justify-start gap-2"> {{-- Align items to the right, start from the top --}}
                                {{-- Tombol Preview Invoice --}}
                                <button onclick="showConfirmation({{ $riwayat->id }})"
                                    class="bg-primary text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-100 shadow w-full md:w-auto text-center">
                                    {{-- Adjusted button styling and width --}}
                                    Preview Invoice
                                </button>
                                @if ($riwayat->hasil_file)
                                    {{-- Tombol Unduh Hasil Pemeriksaan (hanya tampil jika ada file) --}}
                                    <a href="{{ asset('storage/' . $riwayat->hasil_file) }}" target="_blank"
                                        class="inline-block bg-secondary text-white px-4 py-2 rounded font-semibold hover:bg-secondary/80 shadow w-full md:w-auto text-center">
                                        {{-- Button styling for link --}}
                                        Unduh Hasil Pemeriksaan (PDF)
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Modal Konfirmasi -->
                        <div id="modal-konfirmasi-{{ $riwayat->id }}"
                            class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-6 max-w-md w-full mx-4">
                                <h3 class="text-xl font-bold mb-4">Konfirmasi</h3>
                                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin melihat invoice untuk pemeriksaan
                                    ini?</p>
                                <div class="flex justify-end gap-4">
                                    <button onclick="closeConfirmation({{ $riwayat->id }})"
                                        class="px-4 py-2 text-gray-600 hover:text-gray-800">Batal</button>
                                    <button onclick="previewInvoice({{ $riwayat->id }})"
                                        class="bg-primary text-black px-4 py-2 rounded font-semibold hover:bg-yellow-100">
                                        Ya, Lihat Invoice
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Preview Invoice -->
                        <div id="modal-invoice-{{ $riwayat->id }}"
                            class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-6 relative">
                                <button onclick="closeInvoice({{ $riwayat->id }})"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                                <div class="bg-white rounded-xl shadow p-6 max-w-lg mx-auto border border-gray-300"
                                    id="invoice-{{ $riwayat->id }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <h2 class="text-xl font-bold text-primary">INVOICE</h2>
                                            <div class="text-sm text-gray-500">No:
                                                INV-{{ str_pad($riwayat->id, 3, '0', STR_PAD_LEFT) }}</div>
                                        </div>
                                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo"
                                            class="h-10 w-10 rounded-full">
                                    </div>
                                    <div class="mb-2">
                                        <div class="font-semibold">Nama: <span
                                                class="font-normal">{{ $riwayat->nama }}</span></div>
                                        <div class="font-semibold">Tanggal: <span
                                                class="font-normal">{{ $riwayat->jadwal_pemeriksaan }}</span></div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="mb-2">
                                        <div>Layanan: <b>{{ $riwayat->jenis_pemeriksaan }}</b></div>
                                        <div>Detail: {{ $riwayat->detail_pemeriksaan }}</div>
                                    </div>
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="font-bold text-lg">Total:
                                            Rp{{ number_format($riwayat->harga ?? 0, 0, ',', '.') }}</div>
                                        <div
                                            class="px-3 py-1 rounded {{ $riwayat->status == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $riwayat->status ?? 'Menunggu Pembayaran' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4 gap-2">
                                    <button onclick="downloadInvoiceAsPDF({{ $riwayat->id }})"
                                        class="bg-secondary text-white px-4 py-2 rounded hover:bg-secondary/80">Unduh
                                        PDF</button>
                                    <button onclick="downloadInvoiceAsJPG({{ $riwayat->id }})"
                                        class="bg-primary text-black px-4 py-2 rounded hover:bg-yellow-100">Unduh
                                        JPG</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Notifikasi -->
                        <div id="modal-notifikasi-{{ $riwayat->id }}"
                            class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-6 max-w-md w-full mx-4">
                                <div class="text-center">
                                    <div class="bg-primary/20 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold mb-2">Data Sedang Diproses</h3>
                                    <p class="text-gray-600 mb-6">Data pemeriksaan Anda sedang diproses oleh tim kami.
                                        Silakan
                                        tunggu informasi selanjutnya.</p>
                                    <button onclick="closeNotification({{ $riwayat->id }})"
                                        class="bg-primary text-black px-6 py-2 rounded-lg font-semibold hover:bg-yellow-100">
                                        Mengerti
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function showConfirmation(id) {
            document.getElementById('modal-konfirmasi-' + id).classList.remove('hidden');
        }

        function closeConfirmation(id) {
            document.getElementById('modal-konfirmasi-' + id).classList.add('hidden');
        }

        function previewInvoice(id) {
            closeConfirmation(id);
            document.getElementById('modal-invoice-' + id).classList.remove('hidden');
        }

        function closeInvoice(id) {
            document.getElementById('modal-invoice-' + id).classList.add('hidden');
        }

        function closeNotification(id) {
            document.getElementById('modal-notifikasi-' + id).classList.add('hidden');
        }

        // Jika ingin otomatis menampilkan notifikasi setelah invoice, tambahkan:
        // function previewInvoice(id) {
        //     closeConfirmation(id);
        //     document.getElementById('modal-invoice-' + id).classList.remove('hidden');
        //     setTimeout(function() {
        //         closeInvoice(id);
        //         document.getElementById('modal-notifikasi-' + id).classList.remove('hidden');
        //     }, 2000);
        // }
    </script>
</body>

</html>
