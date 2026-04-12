<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guideData->title ?? 'Panduan' }} - Al-Khairat</title>
    
    @vite(['resources/css/app.css'])
    @stack('styles')

    <!-- Theme Detection Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-bg font-sans text-text transition-colors duration-500">
    <!-- Logo Header -->
    <x-logo-header />

    <!-- Floating Navigation Dock -->
    @include('components.dock-navigation')

    <!-- Main Content -->
    <main class="min-h-screen pt-32 sm:pt-28 md:pt-40 lg:pt-44 pb-16 md:pb-20">
        <div class="max-w-5xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="flex flex-wrap items-center gap-1 mb-6 md:mb-8 text-xs sm:text-sm text-text/60 overflow-x-auto pb-2">
                <a href="{{ route('panduan-tasuh') }}" class="hover:text-orange transition whitespace-nowrap">Panduan Tasuh</a>
                <span class="mx-1">/</span>
                <a href="{{ route('panduan-tasuh') }}" class="hover:text-orange transition capitalize whitespace-nowrap">{{ $category }}</a>
                <span class="mx-1">/</span>
                <span class="text-text font-semibold truncate">{{ $guideData->title ?? 'Detail' }}</span>
            </div>

            <!-- Header Section -->
            <div class="mb-10 md:mb-12">
                <div class="flex flex-col sm:flex-row sm:items-start gap-4 md:gap-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl sm:rounded-2xl bg-gradient-sunset text-white flex items-center justify-center text-4xl sm:text-5xl flex-shrink-0 brightness-110">
                        {{ $guideData->icon ?? '📖' }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex flex-wrap items-center gap-1 sm:gap-2 bg-surface/60 dark:bg-surface/40 backdrop-blur border border-orange/10 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-semibold text-orange mb-2 md:mb-3">
                            <span class="w-2 h-2 rounded-full bg-orange animate-pulse flex-shrink-0"></span>
                            <span>{{ $guideData->badge ?? 'Panduan' }}</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-text mb-2 md:mb-3 leading-tight break-words">{{ $guideData->title ?? 'Detail Panduan' }}</h1>
                        <p class="text-sm sm:text-base md:text-lg text-text/70 leading-relaxed">{{ $guideData->description ?? 'Panduan lengkap untuk membantu perjalanan spiritual Anda' }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-4 md:space-y-6">
                    <!-- Overview Section -->
                    @if($guideData->overview)
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                        <h2 class="text-xl sm:text-2xl font-serif font-bold text-text mb-3 md:mb-4">Gambaran Umum</h2>
                        <p class="text-sm sm:text-base text-text/80 leading-relaxed">{{ $guideData->overview }}</p>
                    </div>
                    @endif

                    <!-- Key Points Section -->
                    @if($guideData->key_points && count($guideData->key_points) > 0)
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                        <h2 class="text-xl sm:text-2xl font-serif font-bold text-text mb-4 md:mb-6">Poin Penting</h2>
                        <div class="space-y-3 md:space-y-4">
                            @foreach($guideData->key_points as $point)
                            <div class="flex gap-3 md:gap-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-gradient-sunset text-white flex items-center justify-center text-xs sm:text-sm font-bold flex-shrink-0 brightness-110">
                                    ✓
                                </div>
                                <div class="min-w-0">
                                    <h3 class="font-bold text-text mb-1 text-sm sm:text-base">{{ $point['title'] ?? '' }}</h3>
                                    <p class="text-text/70 text-xs sm:text-sm leading-relaxed">{{ $point['description'] ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Detailed Content Section -->
                    @if($guideData->sections && count($guideData->sections) > 0)
                    <div class="space-y-4 md:space-y-6">
                        @foreach($guideData->sections as $section)
                        <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                            <h3 class="text-lg sm:text-xl font-serif font-bold text-text mb-3 md:mb-4">{{ $section['heading'] ?? '' }}</h3>
                            <p class="text-sm sm:text-base text-text/80 leading-relaxed mb-3 md:mb-4">{{ $section['content'] ?? '' }}</p>
                            @if(isset($section['items']) && count($section['items']) > 0)
                            <ul class="space-y-2 md:space-y-3">
                                @foreach($section['items'] as $item)
                                <li class="flex items-start gap-2 md:gap-3 text-text/80 text-sm sm:text-base">
                                    <span class="text-orange mt-0.5 flex-shrink-0">→</span>
                                    <span class="leading-relaxed">{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-4 md:space-y-6">
                    <!-- Tips Card -->
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-orange/20 lg:sticky lg:top-24">
                        <h3 class="text-lg sm:text-lg font-serif font-bold text-text mb-3 md:mb-4 flex items-center gap-2">
                            <span>💡</span> <span class="leading-tight">Tips Penting</span>
                        </h3>
                        <ul class="space-y-2 md:space-y-3">
                            @if($guideData->tips && count($guideData->tips) > 0)
                                @foreach($guideData->tips as $tip)
                                <li class="flex items-start gap-2 text-xs sm:text-sm text-text/80">
                                    <span class="text-orange flex-shrink-0 mt-0.5">•</span>
                                    <span class="leading-relaxed">{{ $tip }}</span>
                                </li>
                                @endforeach
                            @else
                                <li class="text-xs sm:text-sm text-text/60">Baca konten di samping untuk tips lebih detail</li>
                            @endif
                        </ul>
                    </div>

                    <!-- CTA Card -->
                    <div class="bg-gradient-sunset rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white">
                        <h3 class="font-bold mb-2 sm:mb-3 text-base sm:text-lg">Butuh Bantuan?</h3>
                        <p class="text-xs sm:text-sm text-white/90 mb-3 sm:mb-4 leading-relaxed">Hubungi tim Al-Khairat untuk konsultasi lebih lanjut</p>
                        <a href="https://wa.me/{{ $whatsapp ?? '6281234567890' }}" target="_blank" class="block w-full bg-white text-orange font-bold py-2 px-3 sm:px-4 rounded-lg text-center hover:shadow-lg hover:scale-105 transition text-xs sm:text-sm">
                            Hubungi Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-10 md:mt-12 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 sm:gap-4">
                <a href="{{ route('panduan-tasuh') }}" class="inline-flex items-center justify-center sm:justify-start gap-2 text-orange font-bold hover:translate-x-2 hover:text-orange/80 transition text-sm md:text-base order-2 sm:order-1">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 rotate-180 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <span>Kembali ke Panduan</span>
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center sm:justify-end gap-2 text-orange font-bold hover:translate-x-2 hover:text-orange/80 transition text-sm md:text-base order-1 sm:order-2">
                    <span>Kembali ke Beranda</span>
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12a9 9 0 0118 0m0 0a9 9 0 01-18 0m18 0a9 9 0 01-18 0"></path></svg>
                </a>
            </div>
        </div>
    </main>

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
