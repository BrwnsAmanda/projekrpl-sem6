<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Rujukan Mitra</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800 font-poppins flex flex-col min-h-screen">

    @include('components.navbar')

    <main class="container mx-auto px-6 py-8 flex-grow">
        <h1 class="text-2xl font-bold mb-6">Riwayat Rujukan Anda</h1>

        {{-- Tabel Riwayat Rujukan --}}
        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Kelamin</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Alamat</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor
                            Telepon</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Lahir</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jadwal Pemeriksaan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Pemeriksaan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Detail Pemeriksaan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Unggahan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Catatan Dokter</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Placeholder loop for rujukan data --}}
                    @if (isset($rujukans) && $rujukans->count() > 0)
                        @foreach ($rujukans as $rujukan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $rujukan->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->jenis_kelamin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $rujukan->alamat }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $rujukan->nik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $rujukan->no_telepon }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->tanggal_lahir }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->jadwal_pemeriksaan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->jenis_pemeriksaan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->detail_pemeriksaan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if ($rujukan->surat_rujukan)
                                        <a href="{{ Storage::url($rujukan->surat_rujukan) }}" target="_blank"
                                            class="text-primary hover:underline">Lihat</a>
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $rujukan->catatan_dokter ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                Belum ada riwayat rujukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Placeholder for Rujukan Preview Modal (Optional, bisa modal atau halaman terpisah) --}}
        {{-- Ini akan ditambahkan dan dikembangkan nanti --}}

    </main>

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
