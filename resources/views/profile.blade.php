@extends('layouts.layout')

@section('title', 'Akun Saya - Al-Khairat')
@section('breadcrumb', 'Pengaturan Profil')

@section('content')
@include('components.dock-navigation')

<div class="max-w-5xl mx-auto">
    <div
        class="relative overflow-hidden rounded-[2.5rem] p-6 md:p-12 gradient-sunset border border-orange/20 shadow-2xl mb-6 md:mb-10 group">
        <div
            class="absolute -right-20 -top-20 w-80 h-80 bg-white/10 blur-[100px] rounded-full group-hover:bg-white/20 transition-all duration-700">
        </div>
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                <div class="w-32 h-32 rounded-[2rem] overflow-hidden border-4 border-white/30 shadow-2xl cursor-pointer group/avatar" onclick="openAvatarModal(this.querySelector('img').src)">
                    <img id="avatar-preview" src="{{ $user->avatar_url }}" class="w-full h-full object-cover group-hover/avatar:scale-110 transition-transform duration-500"
                        alt="Profile Backdrop">
                </div>
                <label for="avatar-input"
                    class="absolute -bottom-2 -right-2 w-10 h-10 bg-white rounded-xl shadow-lg flex items-center justify-center cursor-pointer hover:scale-110 transition-transform text-orange">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </label>
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-xl md:text-3xl font-serif font-bold text-white leading-tight">Halo, {{ $user->nickname ??
                    $user->name }}!</h1>
                <p class="text-white/80 mt-2 text-sm md:text-base font-medium">Kelola identitas digital Anda untuk pengalaman yang lebih
                    personal.</p>
                <div
                    class="mt-4 flex flex-wrap justify-center md:justify-start gap-2 text-[10px] font-bold uppercase tracking-widest">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-white border border-white/30">{{ $user->role
                        }}</span>
                    <span
                        class="px-3 py-1 bg-emerald-500/20 rounded-full text-emerald-100 border border-emerald-500/30 italic">Akun
                        Terverifikasi</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-[3fr_2fr] gap-8 items-start">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*"
                onchange="previewAvatar(this)">

            <div class="glass-dashboard rounded-[2.5rem] p-6 md:p-8 border border-slate-100 shadow-xl">
                <div class="flex items-center gap-3 mb-6 md:mb-8">
                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-charcoal">Identitas Diri</h2>
                        <p class="text-sm text-slate-500 mt-1">Perbarui informasi utama akun Anda dalam satu panel yang
                            lebih rapi.</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Nama
                                Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                                placeholder="Nama sesuai KTP">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Nickname
                                / Nama Panggilan</label>
                            <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                                placeholder="Panggilan akrab">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Email
                            Aktif</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                            placeholder="Contoh: user@email.com">
                    </div>
                </div>

                <div class="flex justify-end pt-6 md:pt-8">
                    <button type="submit"
                        class="btn-dashboard btn-dashboard-primary w-full md:min-w-[220px] px-8 py-4 rounded-2xl shadow-lg shadow-orange/20 flex items-center justify-center gap-2 group">
                        <span class="group-hover:rotate-12 transition-transform">💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('profile.password.update') }}" method="POST"
            class="glass-dashboard rounded-[2.5rem] p-6 md:p-8 border border-slate-100 shadow-xl bg-white xl:sticky xl:top-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-3 mb-6 md:mb-8">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-charcoal">Keamanan Akun</h2>
                    <p class="text-sm text-slate-500 mt-1">Perbarui password akun Anda diubah berkala.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Password Saat Ini</label>
                    <input type="password" name="current_password"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                        placeholder="Ketik password lama" required>
                </div>
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Password Baru</label>
                    <input type="password" name="new_password"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                        placeholder="Ketik password baru" required>
                </div>
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none"
                        placeholder="Ulangi password baru" required>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full btn-dashboard btn-dashboard-primary py-4 rounded-2xl shadow-lg shadow-orange/20 flex items-center justify-center gap-2 group">
                    <span class="group-hover:rotate-12 transition-transform">🔐</span>
                    <span>Reset Password</span>
                </button>
            </div>
        </form>
    </div>

    <div class="mt-12 space-y-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m0 0h3.5A1.5 1.5 0 0121 10.5v9a1.5 1.5 0 01-1.5 1.5H3.5A1.5 1.5 0 012 19.5v-9A1.5 1.5 0 013.5 9H9">
                    </path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-charcoal">Riwayat Pesanan</h2>
                <p class="text-sm text-slate-500 mt-1">Lihat semua pesanan yang sudah Anda buat, status pembayarannya,
                    dan petunjuk tindak lanjut.</p>
            </div>
        </div>

        @if($bookingHistories->isEmpty())
        <div class="glass-dashboard rounded-[2.5rem] p-8 border border-slate-100 shadow-xl text-center">
            <div
                class="w-16 h-16 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-5 text-slate-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-charcoal">Belum Ada Pesanan</h3>
            <p class="text-sm text-slate-500 mt-2">Pesanan yang Anda buat nanti akan muncul di sini beserta petunjuk
                invoice dan pembayarannya.</p>
        </div>
        @else
        <div class="space-y-5">
            @foreach($bookingHistories as $history)
            @php
            $statusMeta = match ($history->payment_status) {
                'verified' => [
                    'badge' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-900/50',
                    'title' => 'Lunas Terbayar',
                    'card' => 'border-emerald-100 dark:border-emerald-900/50',
                    'accent' => 'text-emerald-600 dark:text-emerald-500',
                ],
                'dp_paid' => [
                    'badge' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border-blue-200 dark:border-blue-900/50',
                    'title' => 'Mencicil (DP)',
                    'card' => 'border-blue-100 dark:border-blue-900/50',
                    'accent' => 'text-blue-600 dark:text-blue-500',
                ],
                'rejected' => [
                    'badge' => 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 border-red-200 dark:border-red-900/50',
                    'title' => 'Pembayaran Ditolak',
                    'card' => 'border-red-100 dark:border-red-900/50',
                    'accent' => 'text-red-600 dark:text-red-500',
                ],
                default => [
                    'badge' => 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-500 border-amber-200 dark:border-amber-900/50',
                    'title' => 'Menunggu Verifikasi',
                    'card' => 'border-yellow-100 dark:border-yellow-900/50',
                    'accent' => 'text-yellow-600 dark:text-yellow-500',
                ],
            };
            @endphp

            <div class="glass-dashboard rounded-[2.5rem] p-5 md:p-8 border shadow-xl {{ $statusMeta['card'] }}">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                    <div class="space-y-6 flex-1">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                            <div>
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    <span
                                        class="inline-flex items-center rounded-full border px-3 py-1 text-[10px] font-black uppercase tracking-[0.2em] {{ $statusMeta['badge'] }}">
                                        {{ $statusMeta['title'] }}
                                    </span>
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                                        {{ $history->created_at->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                                <h3 class="text-lg md:text-2xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">{{ $history->product_name }}</h3>
                                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-2">Kode Referensi: <span
                                        class="font-mono font-black text-slate-700 dark:text-slate-200">#{{ $history->reference_code }}</span></p>
                            </div>
                            <div class="rounded-3xl bg-slate-50/80 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 px-5 py-4 min-w-full md:min-w-[240px]">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 dark:text-slate-500">Total
                                    Pembayaran</p>
                                <p class="mt-2 text-xl md:text-2xl font-black text-slate-800 dark:text-white">Rp {{
                                    number_format($history->total_amount, 0, ',', '.') }}</p>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 font-bold uppercase tracking-widest">{{ $history->payment_method }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="rounded-3xl bg-white/80 border border-slate-100 px-5 py-4">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Kategori
                                    Paket</p>
                                <p class="mt-2 text-base font-bold text-charcoal">{{ $history->product_category }}</p>
                            </div>
                            <div class="rounded-3xl bg-white/80 border border-slate-100 px-5 py-4">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Durasi</p>
                                <p class="mt-2 text-base font-bold text-charcoal">{{ $history->duration }}</p>
                            </div>
                            <div class="rounded-3xl bg-white/80 border border-slate-100 px-5 py-4">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Jumlah
                                    Jamaah</p>
                                <p class="mt-2 text-base font-bold text-charcoal">{{ $history->pilgrim_count }} Orang
                                </p>
                            </div>
                        </div>

                        <div
                            class="rounded-3xl px-5 py-4 border {{ $history->payment_status === 'verified' ? 'bg-emerald-50 border-emerald-100' : ($history->payment_status === 'rejected' ? 'bg-red-50 border-red-100' : 'bg-yellow-50 border-yellow-100') }}">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] {{ $statusMeta['accent'] }}">
                                Petunjuk Pesanan</p>
                            <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $history->next_step }}</p>
                        </div>
                    </div>

                    <div class="lg:w-[280px] space-y-4">
                        <a href="{{ isset($history->product_id) ? route('products.rundown', $history->product_id) : '#' }}"
                            class="w-full inline-flex items-center justify-center gap-3 bg-white border-2 border-slate-200 text-charcoal font-bold px-6 py-4 rounded-2xl hover:border-orange hover:text-orange transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Lihat Rundown Kegiatan
                        </a>

                        @if($history->payment_status === 'verified' && $history->invoice_url)
                        <a href="{{ $history->invoice_url }}"
                            class="w-full inline-flex items-center justify-center gap-3 bg-gradient-sunset text-white font-bold px-6 py-4 rounded-2xl hover:shadow-xl hover:shadow-orange/20 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586A1 1 0 0113.293 3.293l4.414 4.414A1 1 0 0118 8.414V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Lihat Invoice Lunas
                        </a>
                        @elseif($history->payment_status === 'pending' && $history->invoice_url)
                        <a href="{{ $history->invoice_url }}"
                            class="w-full inline-flex items-center justify-center gap-3 bg-gradient-sunset text-white font-bold px-6 py-4 rounded-2xl hover:shadow-xl hover:shadow-orange/20 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Lihat Petunjuk Pembayaran
                        </a>
                        @endif

                        @if($history->payment_status === 'verified' && $history->invoice_pdf_url)
                        <a href="{{ $history->invoice_pdf_url }}" target="_blank"
                            class="w-full inline-flex items-center justify-center gap-3 bg-white border-2 border-slate-200 text-charcoal font-bold px-6 py-4 rounded-2xl hover:border-orange hover:text-orange transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 3h6l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3v5h5">
                                </path>
                            </svg>
                            Simpan PDF
                        </a>
                        @endif

                        @if($history->payment_status === 'rejected')
                        <a href="{{ route('home') }}"
                            class="w-full inline-flex items-center justify-center gap-3 bg-white border-2 border-slate-200 text-charcoal font-bold px-6 py-4 rounded-2xl hover:border-orange hover:text-orange transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Beranda
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function openAvatarModal(src) {
        const modal = document.getElementById('avatarModal');
        const modalImg = document.getElementById('avatarModalImg');
        modalImg.src = src;
        modal.classList.remove('hidden');
        // Trigger reflow
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        modalImg.classList.remove('scale-95');
        modalImg.classList.add('scale-100');
    }

    function closeAvatarModal() {
        const modal = document.getElementById('avatarModal');
        const modalImg = document.getElementById('avatarModalImg');
        modal.classList.add('opacity-0');
        modalImg.classList.remove('scale-100');
        modalImg.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

<!-- Avatar Modal -->
<div id="avatarModal" class="hidden fixed inset-0 z-[100] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 transition-opacity duration-300" onclick="closeAvatarModal()">
    <button class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="avatarModalImg" src="" class="max-w-full max-h-[90vh] rounded-2xl shadow-2xl transform scale-95 transition-transform duration-300" onclick="event.stopPropagation()">
</div>
@endpush
@endsection