<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Al-Khairat')</title>
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <!-- Header -->
    @include('components.header')
    
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="toggleSidebar()"></div>
    
    <!-- Main Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="flex-1 ml-0 md:ml-64">
            <!-- Navigation Breadcrumb -->
            @include('components.breadcrumb')
            
            <!-- Content Area -->
            <div class="p-4 md:p-6">
                <!-- Flash Messages -->
                @include('components.alert')
                
                <!-- Page Content -->
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    @include('components.footer')
    
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
</body>
</html>
