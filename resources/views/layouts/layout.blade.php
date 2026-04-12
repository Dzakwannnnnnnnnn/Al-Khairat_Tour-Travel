<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Al-Khairat')</title>
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="bg-bg text-text selection:bg-orange/30 font-sans antialiased">
    <!-- Main Container -->
    <div class="flex min-h-screen relative">
        <!-- Sidebar (Admin Only) -->
        @if(auth()->user()->isAdmin())
            @include('components.sidebar')
        @endif
        
        <!-- Main Content -->
        <div class="flex-1 min-h-screen flex flex-col transition-all duration-300 {{ auth()->user()->isAdmin() ? 'ml-0 md:ml-72 lg:ml-80' : 'ml-0' }}">
            <main class="flex-1">
                <!-- Dashboard Header -->
                @include('components.header')

                <!-- Navigation Breadcrumb -->
                <div class="px-4">
                    @include('components.breadcrumb')
                </div>

                <!-- Content Area -->
                <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto">
                    <!-- Flash Messages -->
                    @include('components.alert')
                    
                    <!-- Page Content -->
                    <div class="animate-[fadeUp_0.8s_ease-out]">
                        @yield('content')
                    </div>
                </div>
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    
    <!-- Vite JS -->
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
