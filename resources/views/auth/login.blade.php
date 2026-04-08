<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Al-Khairat Tour & Travel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gradient-to-br from-cream via-white to-cream flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8 flex flex-col items-center">
            <a href="{{ route('home') }}" class="group transition-transform hover:scale-105 duration-300">
                <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat Logo" class="h-28 md:h-36 object-contain shadow-sm bg-white p-2 rounded-2xl">
            </a>
            <p class="text-brown mt-4 text-sm font-medium tracking-wide uppercase">Masuk ke akun Anda</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-orange/10">
            <!-- Flash Messages -->
            @if ($message = Session::get('success'))
                <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm flex items-center space-x-2">
                    <span>✅</span>
                    <span>{{ $message }}</span>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-800 text-sm flex items-center space-x-2">
                    <span>❌</span>
                    <span>{{ $message }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-700 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-charcoal mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="masukkan@email.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-charcoal mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange transition text-sm"
                        placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-orange border-gray-300 rounded focus:ring-orange">
                        <span class="text-sm text-brown">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full btn-primary py-3.5 text-base font-bold rounded-xl">
                    Masuk
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-6 pt-6 border-t border-gray-100">
                <p class="text-sm text-brown">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-orange font-semibold hover:underline">Daftar sekarang</a>
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
