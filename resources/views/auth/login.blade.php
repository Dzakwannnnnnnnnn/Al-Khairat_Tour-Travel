<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Al-Khairat Tour & Travel</title>
    @vite(['resources/css/app.css'])
    <style>
        .auth-container {
            display: flex;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .auth-left {
            display: none;
            width: 50%;
            position: relative;
            background: #2C2416;
            overflow: hidden;
        }
        .auth-right {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow-y: auto;
            min-height: 100vh;
            background: #FBF8F3;
        }
        @media (min-width: 1024px) {
            .auth-left {
                display: block;
            }
            .auth-right {
                width: 50%;
                padding: 3rem;
            }
        }
        .auth-bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.65;
            transition: transform 20s ease;
        }
        .auth-left:hover .auth-bg-img {
            transform: scale(1.08);
        }
        .auth-overlay-1 {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, #2C2416 0%, rgba(44,36,22,0.4) 50%, transparent 100%);
        }
        .auth-overlay-2 {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(44,36,22,0.6) 0%, transparent 100%);
        }
        .auth-left-content {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 3.5rem;
            z-index: 10;
            width: 100%;
        }
        .auth-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(243,156,18,0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            border: 1px solid rgba(243,156,18,0.3);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #F39C12;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .auth-badge-star {
            width: 1rem;
            height: 1rem;
            color: #F39C12;
        }
        .auth-left-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #FBF8F3;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            max-width: 28rem;
            text-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }
        .auth-left-desc {
            font-size: 1.05rem;
            color: rgba(251,248,243,0.75);
            max-width: 26rem;
            padding-bottom: 1rem;
            line-height: 1.8;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        .auth-input-group {
            position: relative;
        }
        .auth-input-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            width: 1.25rem;
            height: 1.25rem;
            color: #8B6F47;
            pointer-events: none;
            opacity: 0.6;
        }
        .auth-input {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 3rem;
            background: rgba(255,255,255,0.7);
            border: 1px solid rgba(44,36,22,0.1);
            border-radius: 0.75rem;
            font-size: 0.875rem;
            color: #2C2416;
            outline: none;
            transition: all 0.2s;
            box-sizing: border-box;
        }
        .auth-input:focus {
            background: white;
            border-color: #E07856;
            box-shadow: 0 0 0 3px rgba(224,120,86,0.15);
        }
        .auth-input::placeholder {
            color: #8B6F47;
            opacity: 0.5;
        }
        .auth-submit {
            width: 100%;
            padding: 1rem;
            color: white;
            background: linear-gradient(135deg, #E07856 0%, #F39547 50%, #F39C12 100%);
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(224,120,86,0.3);
            transition: all 0.3s;
        }
        .auth-submit:hover {
            background: linear-gradient(135deg, #D46E4A 0%, #E8956A 50%, #F39547 100%);
            box-shadow: 0 8px 25px rgba(224,120,86,0.45);
            transform: translateY(-2px);
        }
        .auth-form-card {
            width: 100%;
            max-width: 28rem;
        }
        .auth-label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #5D4E45;
            margin-bottom: 0.5rem;
        }
        .auth-back-btn {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.75rem;
            height: 2.75rem;
            background: rgba(255,255,255,0.6);
            border-radius: 9999px;
            color: #5D4E45;
            text-decoration: none;
            transition: all 0.3s;
            border: 1px solid rgba(44,36,22,0.08);
        }
        .auth-back-btn:hover {
            color: #E07856;
            background: rgba(224,120,86,0.1);
            border-color: rgba(224,120,86,0.2);
        }
        @media (min-width: 1024px) {
            .auth-back-btn {
                top: 2.5rem;
                right: 2.5rem;
            }
            .auth-left-title {
                font-size: 3rem;
            }
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .auth-error-box {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #FEF2F2;
            border-left: 4px solid #EF4444;
            border-radius: 0.5rem;
        }
        .auth-error-text {
            font-size: 0.875rem;
            color: #B91C1C;
            font-weight: 500;
        }
        .auth-success-box {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .auth-success-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            background: #D1FAE5;
            border-radius: 9999px;
            flex-shrink: 0;
        }
        .auth-danger-box {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .auth-danger-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            background: #FEE2E2;
            border-radius: 9999px;
            flex-shrink: 0;
        }
        .auth-remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 0.25rem;
        }
        .auth-remember label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            font-size: 0.875rem;
            color: #5D4E45;
            font-weight: 500;
        }
        .auth-remember label:hover {
            color: #2C2416;
        }
        .auth-remember input[type="checkbox"] {
            width: 1.125rem;
            height: 1.125rem;
            accent-color: #E07856;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .auth-forgot {
            font-size: 0.8125rem;
            font-weight: 700;
            color: #E07856;
            text-decoration: none;
            transition: color 0.2s;
        }
        .auth-forgot:hover {
            color: #D46E4A;
        }
        .auth-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body class="m-0 p-0 font-sans">
    <div class="auth-container">
        
        <!-- Left Panel: Image -->
        <div class="auth-left">
            <img src="{{ asset('images/auth-bg.png') }}" alt="Mekkah" class="auth-bg-img">
            <div class="auth-overlay-1"></div>
            <div class="auth-overlay-2"></div>
            
            <div class="auth-left-content">
                <div class="auth-badge">
                    <svg class="auth-badge-star" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>Perjalanan Penuh Berkah</span>
                </div>
                <h2 class="auth-left-title">
                    Selamat Datang Kembali
                </h2>
                <p class="auth-left-desc">
                    Masuk ke akun Anda untuk merencanakan ibadah, melacak detail pemesanan, dan mengelola tabungan Umrah dengan penuh kemudahan.
                </p>
            </div>
        </div>

        <!-- Right Panel: Form -->
        <div class="auth-right">
            <a href="{{ route('home') }}" class="auth-back-btn" title="Kembali ke Beranda">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>

            <div class="auth-form-card">
                <!-- Logo -->
                <div style="display:flex; align-items:center; justify-content:center; gap:1rem; margin-bottom:3rem;">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat" style="height:6rem; border-radius:1rem; box-shadow:0 4px 12px rgba(44,36,22,0.12); background:white; padding:0.4rem; border:1px solid rgba(44,36,22,0.08);">
                </div>
                
                <h1 style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:700; color:#2C2416; margin-bottom:0.5rem; letter-spacing:-0.025em;">Masuk ke Akun</h1>
                <p style="color:#8B6F47; margin-bottom:2.5rem; font-size: 0.95rem;">Silakan masukkan email dan password akun Anda.</p>

                <!-- Flash Messages -->
                @if ($message = Session::get('success'))
                    <div class="auth-success-box">
                        <div class="auth-success-icon">
                            <svg width="16" height="16" fill="none" stroke="#059669" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span style="font-size:0.875rem; color:#065F46; font-weight:600;">{{ $message }}</span>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="auth-danger-box">
                        <div class="auth-danger-icon">
                            <svg width="16" height="16" fill="none" stroke="#DC2626" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <span style="font-size:0.875rem; color:#991B1B; font-weight:600;">{{ $message }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="auth-error-box">
                        <div style="display:flex; align-items:flex-start;">
                            <svg style="width:1.25rem;height:1.25rem;color:#EF4444;margin-right:0.75rem;flex-shrink:0;margin-top:0.125rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p class="auth-error-text">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" style="display:flex;flex-direction:column;gap:1.5rem;">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="auth-label">Email Utama</label>
                        <div class="auth-input-group">
                            <svg class="auth-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                class="auth-input"
                                placeholder="Alamat email saat mendaftar">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="auth-label-row">
                            <label for="password" class="auth-label" style="margin-bottom:0;">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="auth-forgot">Lupa sandi?</a>
                            @endif
                        </div>
                        <div class="auth-input-group">
                            <svg class="auth-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <input type="password" id="password" name="password" required
                                class="auth-input"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="auth-remember">
                        <label>
                            <input type="checkbox" name="remember">
                            <span>Ingat sesi ini</span>
                        </label>
                    </div>

                    <button type="submit" class="auth-submit" style="margin-top:0.5rem;">
                        Masuk ke Dashboard
                    </button>
                </form>

                <div style="margin-top:2rem; text-align:center;">
                    <p style="font-size:0.875rem; color:#5D4E45;">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" style="color:#E07856; font-weight:700; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#D46E4A'" onmouseout="this.style.color='#E07856'">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
