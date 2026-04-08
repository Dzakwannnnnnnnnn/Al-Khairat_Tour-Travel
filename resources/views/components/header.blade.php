<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left: Hamburger + Logo -->
            <div class="flex items-center space-x-3">
                <!-- Mobile Hamburger -->
                <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <span class="text-xl sm:text-2xl font-bold text-indigo-600">AL-KHAIRAT</span>
                </a>
            </div>
            
            <!-- Right: User Menu -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <a href="{{ route('home') }}" target="_blank" class="text-gray-600 hover:text-gray-900 text-sm hidden sm:block">
                    🌐 Lihat Website
                </a>
                <div class="relative group">
                    <button class="flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=E07856&color=fff&size=32" alt="User" class="w-8 h-8 rounded-full">
                        <span class="hidden sm:block text-sm text-gray-700 max-w-[120px] truncate">{{ auth()->user()->name ?? 'User' }}</span>
                        <svg class="w-4 h-4 text-gray-400 hidden sm:block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
