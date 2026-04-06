<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">AL-KHAIRAT</span>
                </a>
            </div>
            
            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Dashboard</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Products</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Services</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</a>
            </nav>
            
            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>
                <div class="relative group">
                    <button class="flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100">
                        <img src="https://ui-avatars.com/api/?name=User" alt="User" class="w-8 h-8 rounded-full">
                        <span class="hidden sm:block text-sm text-gray-700">User</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
