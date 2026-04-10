@extends('layouts.layout')

@section('title', 'Akun Saya - Al-Khairat')
@section('breadcrumb', 'Pengaturan Profil')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Profile Header Card -->
    <div class="relative overflow-hidden rounded-[2.5rem] p-8 md:p-12 gradient-sunset border border-orange/20 shadow-2xl mb-10 group">
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-white/10 blur-[100px] rounded-full group-hover:bg-white/20 transition-all duration-700"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                <div class="w-32 h-32 rounded-[2rem] overflow-hidden border-4 border-white/30 shadow-2xl">
                    <img id="avatar-preview" src="{{ $user->avatar_url }}" class="w-full h-full object-cover" alt="Profile Backdrop">
                </div>
                <label for="avatar-input" class="absolute -bottom-2 -right-2 w-10 h-10 bg-white rounded-xl shadow-lg flex items-center justify-center cursor-pointer hover:scale-110 transition-transform text-orange">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </label>
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-serif font-bold text-white leading-tight">Halo, {{ $user->nickname ?? $user->name }}!</h1>
                <p class="text-white/80 mt-2 font-medium">Kelola identitas digital Anda untuk pengalaman yang lebih personal.</p>
                <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-2 text-[10px] font-bold uppercase tracking-widest">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-white border border-white/30">{{ $user->role }}</span>
                    <span class="px-3 py-1 bg-emerald-500/20 rounded-full text-emerald-100 border border-emerald-500/30 italic">Akun Terverifikasi</span>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*" onchange="previewAvatar(this)">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Side: Basic Info -->
            <div class="lg:col-span-2 space-y-8">
                <div class="glass-dashboard rounded-[2.5rem] p-8 md:p-10 border border-slate-100 shadow-xl">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-charcoal">Identitas Diri</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none" placeholder="Nama sesuai KTP">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Nickname / Nama Panggilan</label>
                                <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none" placeholder="Panggilan akrab">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Email Aktif</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-charcoal focus:border-orange focus:ring-4 focus:ring-orange/5 transition-all outline-none" placeholder="Contoh: user@email.com">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="btn-dashboard btn-dashboard-primary !px-12 py-4 rounded-2xl shadow-lg shadow-orange/20 flex items-center gap-2 group">
                        <span class="group-hover:rotate-12 transition-transform">💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </div>

            <!-- Right Side: Security -->
            <div class="lg:col-span-1 space-y-8">
                <div class="glass-dashboard rounded-[2.5rem] p-8 border border-slate-100 shadow-xl bg-slate-50/30">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h2 class="text-lg font-bold text-charcoal">Ganti Password</h2>
                    </div>

                    <div class="space-y-5">
                        <p class="text-[10px] text-slate-400 leading-relaxed font-medium">Kosongkan jika tidak ingin mengubah password Anda.</p>
                        
                        <div>
                            <input type="password" name="current_password" 
                                class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-charcoal focus:border-orange outline-none transition-all" placeholder="Password Saat Ini">
                        </div>
                        <div>
                            <input type="password" name="new_password" 
                                class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-charcoal focus:border-orange outline-none transition-all" placeholder="Password Baru">
                        </div>
                        <div>
                            <input type="password" name="new_password_confirmation" 
                                class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-charcoal focus:border-orange outline-none transition-all" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
</script>
@endpush
@endsection
