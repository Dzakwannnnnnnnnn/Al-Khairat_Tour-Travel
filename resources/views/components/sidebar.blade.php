<aside id="adminSidebar" class="w-64 bg-gray-900 text-white h-screen fixed left-0 top-16 overflow-y-auto z-40 transition-transform duration-300 -translate-x-full md:translate-x-0">
    <nav class="p-4">
        <div class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zm11-3a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd"></path>
                </svg>
                <span>Dashboard</span>
            </a>
            
            <!-- Data Master -->
            <div class="space-y-1">
                <p class="text-xs font-semibold text-gray-400 uppercase px-4 pt-4 pb-2">Data Master</p>
                <a href="{{ route('users.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Users</span>
                </a>
                <a href="{{ route('products.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('products.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span>Paket Umroh</span>
                </a>
            </div>

            <!-- Transaksi -->
            <div class="space-y-1 border-t border-gray-700 pt-2 mt-2">
                <p class="text-xs font-semibold text-gray-400 uppercase px-4 pt-2 pb-2">Transaksi</p>
                <a href="{{ route('bookings.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('bookings.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span>Pemesanan</span>
                </a>
                <a href="{{ route('payments.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('payments.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span>Pembayaran</span>
                </a>
                <a href="{{ route('documents.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('documents.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Dokumen Jamaah</span>
                </a>
            </div>

            <!-- Konten Web -->
            <div class="space-y-1 border-t border-gray-700 pt-2 mt-2">
                <p class="text-xs font-semibold text-gray-400 uppercase px-4 pt-2 pb-2">Konten Web</p>
                <a href="{{ route('testimonials.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('testimonials.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>Testimoni</span>
                </a>
                <a href="{{ route('guides.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('guides.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span>Manasik Digital</span>
                </a>
                <a href="{{ route('faqs.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('faqs.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>FAQ</span>
                </a>
            </div>

            <!-- Sistem -->
            <div class="space-y-1 border-t border-gray-700 pt-2 mt-2">
                <p class="text-xs font-semibold text-gray-400 uppercase px-4 pt-2 pb-2">Sistem</p>
                <a href="{{ route('settings.index') }}" onclick="closeSidebarMobile()" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('settings.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Pengaturan Web</span>
                </a>
            </div>
            
            <!-- Account -->
            <div class="space-y-1 border-t border-gray-700 pt-4">
                <p class="text-xs font-semibold text-gray-400 uppercase px-4 pb-2">Akun</p>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    <span>Lihat Website</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H3zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</aside>

<script>
    function closeSidebarMobile() {
        if (window.innerWidth < 768) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
        }
    }
</script>
