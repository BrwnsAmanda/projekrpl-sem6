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

    <main class="flex-grow flex items-center justify-center px-8 py-20">
        <div class="bg-white rounded-xl shadow-md p-20 text-center space-y-20" style="width: 100%; max-width: 800px; min-height: 300px;">
            <h1 class="text-xl md:text-2xl font-semibold mb-10 pt-6">
                <br><br><br>Selamat Datang, Mitra Laboratorium Prodifa!
            </h1>
            <p class="text-sm md:text-base text-gray-700 mt-8">
                Kolaborasi dengan Anda adalah kehormatan bagi kami.<br> Mari terus bersinergi memberikan layanan kesehatan terbaik bagi masyarakat.
            </p>
        </div>
    </main>

    @include('components.footer')

</body>
</html>
