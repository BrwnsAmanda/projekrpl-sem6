<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Laboratorium Prodifa</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-cream font-sans">
    <a href="{{ route('home') }}" class="absolute top-4 left-4 text-gray-600 hover:text-secondary flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-sm">Kembali ke Beranda</span>
    </a>
    <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
        <!-- Kiri: Form Daftar -->
        <div class="flex flex-col justify-center items-center p-6 md:p-12 bg-cream">
            <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-center text-black mb-2">Daftar Akun Baru</h2>
                <p class="text-center text-gray-600 mb-6">Silakan isi data diri Anda untuk membuat akun.</p>

                <!-- Tombol Google -->
                <div class="flex justify-center mb-6">
                    <button class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-black hover:bg-gray-100">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-5 w-5">
                        <span>Daftar dengan Google</span>
                    </button>
                </div>

                <div class="flex items-center mb-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="mx-3 text-gray-500 text-sm">atau daftar dengan email</span>
                    <hr class="flex-grow border-gray-300">
                </div>

                <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold mb-1">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary">
                    </div>

                    <div class="relative">
                        <label for="password" class="block text-sm font-semibold mb-1">Kata Sandi</label>
                        <input type="password" id="password" name="password"
                            required
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary pr-10">

                        {{-- ikon mata di password --}}
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-9 text-gray-500 hover:text-gray-700">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>



                    <button type="submit" class="w-full py-2 rounded-md bg-primary text-black font-bold hover:bg-yellow-500">
                        Daftar
                    </button>
                </form>

                <p class="text-sm text-center mt-6">Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-secondary hover:underline font-medium">Masuk</a>
                </p>
            </div>
        </div>

        <!-- Kanan: Gambar -->
        <div class="hidden md:block relative bg-cover bg-center" style="background-image: url('{{ asset('images/registerbg.jpeg') }}');">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.973 9.973 0 012.002-3.368m2.161-2.263A9.953 9.953 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.293 5.368M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3l18 18" />`;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />`;
            }
        }
        </script>


</body>
</html>
