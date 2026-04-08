<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Al-Khairat Tour & Travel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gradient-to-br from-cream via-white to-cream flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8 flex flex-col items-center">
            <a href="{{ route('home') }}" class="group transition-transform hover:scale-105 duration-300">
                <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat Logo" class="h-28 md:h-36 object-contain shadow-sm bg-white p-2 rounded-2xl">
            </a>
            <p class="text-brown mt-4 text-sm font-medium tracking-wide uppercase">Buat akun baru</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-orange/10">
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-700 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-charcoal mb-1.5">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="Nama lengkap Anda">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-charcoal mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="masukkan@email.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-charcoal mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="Minimal 8 karakter">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-charcoal mb-1.5">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="Ulangi password">
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full btn-primary py-3.5 text-base font-bold rounded-xl">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6 pt-6 border-t border-gray-100">
                <p class="text-sm text-brown">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-orange font-semibold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-sm text-brown hover:text-orange transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
