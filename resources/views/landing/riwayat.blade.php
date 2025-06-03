<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    {{-- Mengambil judul dari main --}}
    <title>Riwayat Pemeriksaan</title>
    {{-- Menyertakan link CSS/JS dari kedua branch --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    {{-- Link fonts dan AOS dari main --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    {{-- Tidak perlu script modal di head, akan digabung di bagian script di bawah --}}
</head>

{{-- Menggunakan kelas body dari main --}}
<body class="bg-cream font-sans font-poppins min-h-screen flex flex-col"> {{-- Tambah flex layout agar footer di bawah --}}
    @include('components.navbar')

    {{-- Konten utama, tambahkan flex-1 agar mendorong footer --}}
    <div class="max-w-5xl mx-auto py-10 px-4 flex-1 w-full">
        <h2 class="text-2xl font-bold mb-6">Riwayat Pemeriksaan</h2>

        {{-- Menggunakan @forelse dari main yang sudah mencakup @empty --}}
        <div class="grid gap-6">
            @forelse ($riwayats as $riwayat)
                 {{-- Struktur tampilan per riwayat dari miexed2, dengan data dari relasi reservasi --}}
                 <div class="bg-white border-2 border-primary rounded-xl shadow p-6 flex flex-col gap-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Kiri: Informasi Pasien (menggunakan data dari relasi reservasi, sesuai struktur query di RiwayatController) --}}
                        <div>
                            <div class="mb-2"><span class="font-semibold">Nama</span> : {{ $riwayat->reservasi->nama ?? '-' }}</div>
                            <div class="mb-2"><span class="font-semibold">Tanggal Lahir</span> : {{ $riwayat->reservasi->tanggal_lahir ?? '-' }}</div>
                            <div class="mb-2"><span class="font-semibold">Jenis Kelamin</span> : {{ $riwayat->reservasi->jenis_kelamin ?? '-' }}</div>
                            <div class="mb-2"><span class="font-semibold">Alamat</span> : {{ $riwayat->reservasi->alamat ?? '-' }}</div>
                            <div class="mb-2"><span class="font-semibold">No. NIK</span> : {{ $riwayat->reservasi->nik ?? '-' }}</div>
                            <div class="mb-2"><span class="font-semibold">No. Telephone</span> : {{ $riwayat->reservasi->telepon ?? '-' }}</div>
                             {{-- Tambah email jika ada di model Reservasi berelasi dengan User --}}
                            <div class="mb-2"><span class="font-semibold">Email</span> : {{ $riwayat->reservasi->user->email ?? '-' }}</div>

                            {{-- Detail Pemeriksaan dan Tanggal (dari relasi reservasi) --}}
                            <div class="mt-4 font-semibold">Pemeriksaan: {{ $riwayat->reservasi->jenis_pemeriksaan ?? '-'}}</div>
                            <div class="text-sm text-gray-600">Tanggal: {{ $riwayat->reservasi->jadwal_pemeriksaan ?? '-'}}</div>
                        </div>

                        {{-- Kanan: Tombol Aksi --}}
                        {{-- Menggunakan struktur dan styling tombol dari miexed2 --}}
                        <div class="flex flex-col items-end justify-start gap-2">
                            {{-- Tombol Preview Invoice --}}
                            {{-- Menggunakan onclick yang memicu modal invoice langsung dari miexed2 --}}
                            <button onclick="previewInvoice({{ $riwayat->id }})"
                                class="bg-primary text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-100 shadow w-full md:w-auto text-center">
                                Preview Invoice
                            </button>
                            {{-- Tombol Unduh Hasil Pemeriksaan (hanya tampil jika ada file) --}}
                            {{-- Menggunakan kondisi dan link dari miexed2 --}}
                            @if ($riwayat->hasil_file)
                                <a href="{{ asset('storage/' . $riwayat->hasil_file) }}" target="_blank"
                                    class="inline-block bg-secondary text-white px-4 py-2 rounded font-semibold hover:bg-secondary/80 shadow w-full md:w-auto text-center">
                                    Unduh Hasil Pemeriksaan (PDF)
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Modal Preview Invoice (dari miexed2, sesuaikan data dengan relasi reservasi) --}}
                    <div id="modal-invoice-{{ $riwayat->id }}"
                        class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                        <div class="bg-white rounded-xl shadow-lg p-6 relative max-w-lg w-full mx-4"> {{-- Atur lebar dan margin --}}
                            <button onclick="closeInvoice({{ $riwayat->id }})"
                                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                            <div class="bg-white rounded-xl shadow p-6 max-w-lg mx-auto border border-gray-300"
                                id="invoice-{{ $riwayat->id }}">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-primary">INVOICE</h2>
                                        {{-- Menggunakan invoice_number dari model Riwayat --}}
                                        <div class="text-sm text-gray-500">No: {{ $riwayat->invoice_number ?? 'INV-' . str_pad($riwayat->id, 3, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo"
                                        class="h-10 w-10 rounded-full">
                                </div>
                                <div class="mb-2">
                                    {{-- Data dari relasi reservasi --}}
                                    <div class="font-semibold">Nama: <span
                                            class="font-normal">{{ $riwayat->reservasi->nama ?? '-' }}</span></div>
                                    <div class="font-semibold">Tanggal: <span
                                            class="font-normal">{{ $riwayat->reservasi->jadwal_pemeriksaan ?? '-'}}</span></div>
                                </div>
                                <hr class="my-2">
                                <div class="mb-2">
                                    {{-- Data dari relasi reservasi --}}
                                    <div>Layanan: <b>{{ $riwayat->reservasi->jenis_pemeriksaan ?? '-' }}</b></div>
                                    <div>Detail: {{ $riwayat->reservasi->detail_pemeriksaan ?? '-' }}</div>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    {{-- Harga dari model Riwayat --}}
                                    <div class="font-bold text-lg">Total:
                                        Rp{{ number_format($riwayat->harga ?? 0, 0, ',', '.') }}</div>
                                    {{-- Status pembayaran dari model Riwayat --}}
                                    <div
                                        class="px-3 py-1 rounded {{ ($riwayat->status_pembayaran ?? '') == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $riwayat->status_pembayaran ?? 'Belum Dibayar' }}
                                    </div>
                                </div>
                            </div>
                            {{-- Tombol Unduh PDF/JPG dari miexed2 --}}
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

                    {{-- Modal Konfirmasi (dari miexed2) --}}
                    {{-- Tidak terlalu diperlukan jika langsung tampilkan invoice, tapi bisa disimpan jika mau konfirmasi sebelum preview --}}
                     {{-- <div id="modal-konfirmasi-{{ $riwayat->id }}"
                         class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                         <div class="bg-white rounded-xl shadow-lg p-6 max-w-md w-full mx-4">
                             <h3 class="text-xl font-bold mb-4">Konfirmasi</h3>
                             <p class="text-gray-600 mb-6">Apakah Anda yakin ingin melihat invoice untuk pemeriksaan ini?</p>
                             <div class="flex justify-end gap-4">
                                 <button onclick="closeConfirmation({{ $riwayat->id }})"
                                     class="px-4 py-2 text-gray-600 hover:text-gray-800">Batal</button>
                                 <button onclick="previewInvoice({{ $riwayat->id }})"
                                     class="bg-primary text-black px-4 py-2 rounded font-semibold hover:bg-yellow-100">
                                     Ya, Lihat Invoice
                                 </button>
                             </div>
                         </div>
                     </div> --}}

                    {{-- Modal Notifikasi (dari miexed2) --}}
                    {{-- Asumsikan modal notifikasi ini tampil setelah submit reservasi, bukan saat melihat riwayat.
                         Jika tetap ingin ada notifikasi di sini, perlu pemicu yang jelas. Untuk sementara diabaikan dalam merge ini.
                         Jika diperlukan, bisa ditambahkan kembali dan dihubungkan dengan logika yang sesuai. --}}
                </div>
            @empty
                {{-- Tampilan jika tidak ada riwayat (dari miexed2 dengan sedikit penyesuaian teks) --}}
                <div class="bg-white rounded-xl shadow-lg p-8 text-center border-l-8 border-secondary">
                     <div class="flex justify-center mb-4">
                         <div class="bg-secondary/20 rounded-full p-4">
                             <svg class="w-12 h-12 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                             </svg>
                         </div>
                     </div>
                     <h3 class="text-xl font-semibold mb-2 text-gray-800">Belum Ada Riwayat Pemeriksaan</h3>
                     <p class="text-gray-600 mb-6">Anda belum memiliki riwayat pemeriksaan. Silakan lakukan reservasi untuk
                         melihat riwayat pemeriksaan Anda.</p>
                     <a href="{{ route('reservasi') }}"
                         class="inline-block bg-primary text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-100 transition">
                         Buat Reservasi
                     </a>
                 </div>
            @endforelse
        </div>
    </div>

    {{-- Footer tetap di bawah (dari main) --}}
    @include('components.footer')

    {{-- Script untuk PDF/JPG download (dari main) --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        // Fungsi untuk menampilkan modal preview invoice
        function previewInvoice(id) {
            // Jika ada modal konfirmasi, bisa ditutup dulu di sini
            // const modalKonfirmasi = document.getElementById('modal-konfirmasi-' + id);
            // if (modalKonfirmasi) {
            //     modalKonfirmasi.classList.add('hidden');
            // }
            document.getElementById('modal-invoice-' + id).classList.remove('hidden');
        }

        // Fungsi untuk menutup modal preview invoice
        function closeInvoice(id) {
            document.getElementById('modal-invoice-' + id).classList.add('hidden');
        }

         // Fungsi untuk download invoice sebagai PDF
         function downloadInvoiceAsPDF(id) {
            const invoiceElement = document.getElementById('invoice-' + id);
            html2canvas(invoiceElement).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'px',
                    format: [canvas.width, canvas.height] // Ukuran PDF sesuai ukuran konten invoice
                });
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save(`invoice-${id}.pdf`);
            });
        }

        // Fungsi untuk download invoice sebagai JPG
         function downloadInvoiceAsJPG(id) {
             const invoiceElement = document.getElementById('invoice-' + id);
             html2canvas(invoiceElement).then(canvas => {
                 const imgData = canvas.toDataURL('image/jpeg', 1.0); // 1.0 quality
                 const link = document.createElement('a');
                 link.href = imgData;
                 link.download = `invoice-${id}.jpg`;
                 link.click();
             });
         }

        // Jika Anda memutuskan butuh modal konfirmasi sebelum preview invoice,
        // Anda bisa menambahkan kembali fungsi ini dan menghubungkannya dengan tombol "Preview Invoice":
        // function showConfirmation(id) {
        //     document.getElementById('modal-konfirmasi-' + id).classList.remove('hidden');
        // }
        // function closeConfirmation(id) {
        //     document.getElementById('modal-konfirmasi-' + id).classList.add('hidden');
        // }

        // Jika ada modal notifikasi (misal setelah submit), fungsi ini bisa digunakan
        // function closeNotification(id) {
        //     document.getElementById('modal-notifikasi-' + id).classList.add('hidden');
        // }

    </script>
</body>

</html>