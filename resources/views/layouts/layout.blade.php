<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Al-Khairat')</title>

    <!-- Dark Mode Init (must run before CSS to prevent flash) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css'])
    @stack('styles')

    <!-- Pre-load Critical Navigation Scripts -->
    <script>
        // Use early-mount pattern for mobile interactivity
        window.toggleSidebar = function() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (!sidebar || !overlay) {
                return;
            }
            
            const isHidden = sidebar.classList.contains('-translate-x-full');

            if (isHidden) {
                // Open
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden', 'pointer-events-none');
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                }, 50);
                document.body.style.overflow = 'hidden';
            } else {
                // Close
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden', 'pointer-events-none');
                }, 300);
                document.body.style.overflow = '';
            }
        };

        window.toggleProfileMenu = function(event) {
            if (event) event.stopPropagation();
            const menu = document.getElementById('adminProfileMenu');
            const chevron = document.getElementById('profile-chevron');
            if (!menu) return;
            
            const isHidden = menu.classList.contains('invisible') || menu.classList.contains('hidden');

            if (isHidden) {
                menu.classList.remove('invisible', 'hidden', 'opacity-0', 'translate-y-2');
                menu.classList.add('visible', 'opacity-100', 'translate-y-0');
                if (chevron) chevron.classList.add('rotate-180');
            } else {
                menu.classList.add('invisible', 'opacity-0', 'translate-y-2');
                menu.classList.remove('visible', 'opacity-100', 'translate-y-0');
                if (chevron) chevron.classList.remove('rotate-180');
            }
        };

        document.addEventListener('click', function(event) {
            const profileMenu = document.getElementById('adminProfileMenu');
            const profileChevron = document.getElementById('profile-chevron');
            if (profileMenu && !profileMenu.contains(event.target)) {
                profileMenu.classList.add('invisible', 'opacity-0', 'translate-y-2');
                profileMenu.classList.remove('visible', 'opacity-100', 'translate-y-0');
                if (profileChevron) profileChevron.classList.remove('rotate-180');
            }
        });
    </script>
</head>
<body class="bg-bg text-text selection:bg-orange/30 font-sans antialiased">
    <!-- Main Container -->
    <div class="flex min-h-screen relative">
        <!-- Sidebar (For all authenticated users) -->
        @if(auth()->check())
            @include('components.sidebar')
            <!-- Mobile Sidebar Overlay -->
            <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-[90] hidden pointer-events-none transition-opacity duration-300 opacity-0" onclick="toggleSidebar()"></div>
        @endif
        
        <!-- Main Content -->
        <div class="flex-1 min-w-0 w-full overflow-x-hidden min-h-screen flex flex-col transition-all duration-300 {{ auth()->check() ? 'ml-0 md:ml-72 lg:ml-80' : 'ml-0' }}">
            <div class="lg:hidden" style="height: 10px;"></div>
            <main class="flex-1 min-w-0 w-full">
                <!-- Dashboard Header -->
                @include('components.header')

                <!-- Navigation Breadcrumb (Increased spacing to prevent 'dempet' look) -->
                <div class="px-4 mb-10 md:mb-12">
                    @include('components.breadcrumb')
                </div>

                <!-- Content Area -->
                <div class="p-4 md:p-8 lg:p-10 max-w-7xl mx-auto pb-32 md:pb-40">
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

    <!-- Global Custom Confirm Modal -->
    @include('components.global-confirm')
    
    <!-- Vite JS -->
    @vite(['resources/js/app.js'])
    @stack('scripts')

    <!-- Dashboard Theme Toggle -->
    <script>
        function updateDashboardThemeIcon() {
            const isDark = document.documentElement.classList.contains('dark');
            const sun = document.getElementById('themeIconSun');
            const moon = document.getElementById('themeIconMoon');
            if (sun && moon) {
                sun.classList.toggle('hidden', !isDark);
                moon.classList.toggle('hidden', isDark);
            }
        }

        function toggleDashboardTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateDashboardThemeIcon();
        }

        document.addEventListener('DOMContentLoaded', updateDashboardThemeIcon);
    </script>
</body>
</html>
