<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemeriksaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-cream font-sans font-poppins min-h-screen flex-col"> <!-- Tambah flex layout -->
    @include('components.navbar')

    <div class="max-w-5xl mx-auto py-10 px-4"> <!-- Tambah flex-1 agar isi konten mendorong footer ke bawah -->
        <h2 class="text-2xl font-bold mb-6">Riwayat Pemeriksaan</h2>
        <div class="grid gap-6">
            @forelse ($riwayats as $riwayat)
                 <div class="bg-white border-2 border-primary rounded-xl shadow p-6 flex flex-col gap-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <div>Nama : {{ $riwayat->reservasi->nama ?? '-' }}</div>
                            <div>Tanggal Lahir : {{ $riwayat->reservasi->tanggal_lahir ?? '-' }}</div>
                            <div>Jenis Kelamin : {{ $riwayat->reservasi->jenis_kelamin ?? '-' }}</div>
                            <div>Alamat : {{ $riwayat->reservasi->alamat ?? '-' }}</div>
                            <div>No.NIK : {{ $riwayat->reservasi->nik ?? '-' }}</div>
                            <div>No.Telephone : {{ $riwayat->reservasi->telepon ?? '-' }}</div>
                            <div>Email : {{ $riwayat->reservasi->user->email ?? '-' }}</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('images/sample-hasil.jpg') }}" alt="Hasil Pemeriksaan"
                                class="w-32 h-32 object-contain rounded-lg border" />
                            <a href="{{ $riwayat['hasil_file'] ?? '#' }}" target="_blank"
                                class="mt-2 text-xs text-primary underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                </svg>
                                Unduh Hasil Pemeriksaan
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="font-semibold mb-1">Pemeriksaan: {{ $riwayat->reservasi->detail_pemeriksaan ?? '-'}}</div>
                        <div class="text-sm text-gray-600">Tanggal: {{ $riwayat->reservasi->jadwal_pemeriksaan ?? '-'}}</div>
                        <button onclick="previewInvoice({{ $riwayat['id'] }})"
                            class="bg-primary text-black px-4 py-2 rounded font-semibold hover:bg-yellow-100 shadow">
                            Preview Invoice
                        </button>
                    </div>
                    <!-- Modal Preview Invoice -->
                    <div id="modal-invoice-{{ $riwayat['id'] }}"
                        class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
                        <div class="bg-white rounded-xl shadow-lg p-6 relative">
                            <button onclick="closeInvoice({{ $riwayat['id'] }})"
                                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                            <div class="bg-white rounded-xl shadow p-6 max-w-lg mx-auto border border-gray-300"
                                id="invoice-{{ $riwayat['id'] }}">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-primary">INVOICE</h2>
                                        <div class="text-sm text-gray-500">No: {{ $riwayat['invoice_number'] }}</div>
                                    </div>
                                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo"
                                        class="h-10 w-10 rounded-full">
                                </div>
                                <div class="mb-2">
                                    <div class="font-semibold">Nama: <span
                                            class="font-normal">{{ $riwayat->reservasi->nama ?? '-' }}</span></div>
                                    <div class="font-semibold">Tanggal: <span
                                            class="font-normal">{{ $riwayat->reservasi->jadwal_pemeriksaan ?? '-'}}</span></div>
                                </div>
                                <hr class="my-2">
                                <div class="mb-2">
                                    <div>Layanan: <b>{{ $riwayat->reservasi->jenis_pemeriksaan ?? '-' }}</b></div>
                                    <div>Detail: {{ $riwayat->reservasi->detail_pemeriksaan ?? '-' }}</div>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="font-bold text-lg">Total:
                                        Rp{{ number_format($riwayat->harga, 0, ',', '.') }}</div>
                                    <div
                                        class="px-3 py-1 rounded {{ $riwayat->status_pembayaran == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $riwayat->status_pembayaran }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4 gap-2">
                                <button onclick="downloadInvoiceAsPDF({{ $riwayat['id'] }})"
                                    class="bg-secondary text-white px-4 py-2 rounded hover:bg-secondary/80">Unduh
                                    PDF</button>
                                <button onclick="downloadInvoiceAsJPG({{ $riwayat['id'] }})"
                                    class="bg-primary text-black px-4 py-2 rounded hover:bg-yellow-100">Unduh
                                    JPG</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-2 border-primary rounded-xl shadow p-6 flex flex-col gap-4">
                    <!-- Detail Konten -->
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada riwayat pemeriksaan.</p>
            @endforelse
        </div>
    </div>

    @include('components.footer') <!-- Tetap di bawah -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function previewInvoice(id) {
            document.getElementById('modal-invoice-' + id).classList.remove('hidden');
        }

        function closeInvoice(id) {
            document.getElementById('modal-invoice-' + id).classList.add('hidden');
        }

        function downloadInvoiceAsPDF(id) {
            const invoice = document.getElementById('invoice-' + id);
            html2canvas(invoice).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new window.jspdf.jsPDF();
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('invoice-' + id + '.pdf');
            });
        }

        function downloadInvoiceAsJPG(id) {
            const invoice = document.getElementById('invoice-' + id);
            html2canvas(invoice).then(canvas => {
                const link = document.createElement('a');
                link.download = 'invoice-' + id + '.jpg';
                link.href = canvas.toDataURL('image/jpeg');
                link.click();
            });
        }
    </script>
</body>

</html>
