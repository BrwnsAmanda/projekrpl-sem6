<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil Mitra</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-cream font-sans font-poppins">
    @include('components.navbar')

    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-primary">Edit Profil Mitra</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block font-semibold text-sm mb-1">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block font-semibold text-sm mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jenis_kelamin" class="block font-semibold text-sm mb-1">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block font-semibold text-sm mb-1">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="my-6 border-gray-200">

                <h3 class="text-lg font-semibold mb-4">Ubah Password</h3>
                <div>
                    <label for="current_password" class="block font-semibold text-sm mb-1">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block font-semibold text-sm mb-1">Password Baru</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block font-semibold text-sm mb-1">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary">
                </div>

                <div class="flex justify-end">
                    <button type="button" id="openConfirmModal"
                        class="bg-primary text-black font-semibold px-6 py-2 rounded hover:bg-yellow-100 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-xl max-w-sm w-full mx-4">
            <h3 class="text-lg font-bold mb-4 text-gray-900">Konfirmasi Perubahan</h3>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menyimpan perubahan pada profil Anda?</p>
            <div class="flex justify-end gap-3">
                <button type="button" id="cancelConfirm"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">Batal</button>
                <button type="button" id="confirmSave"
                    class="px-4 py-2 bg-primary text-black rounded hover:bg-yellow-100 transition">Ya, Simpan</button>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openConfirmModalBtn = document.getElementById('openConfirmModal');
            const confirmModal = document.getElementById('confirmModal');
            const cancelConfirmBtn = document.getElementById('cancelConfirm');
            const confirmSaveBtn = document.getElementById('confirmSave');
            const profileForm = document.querySelector('form');

            openConfirmModalBtn.addEventListener('click', function() {
                confirmModal.classList.remove('hidden');
            });

            cancelConfirmBtn.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            confirmSaveBtn.addEventListener('click', function() {
                profileForm.submit();
            });

            // Close modal if clicked outside
            confirmModal.addEventListener('click', function(event) {
                if (event.target === confirmModal) {
                    confirmModal.classList.add('hidden');
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && !confirmModal.classList.contains('hidden')) {
                    confirmModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
