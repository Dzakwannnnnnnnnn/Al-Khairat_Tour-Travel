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
    
    <!-- Main Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="flex-1">
            <!-- Navigation Breadcrumb -->
            @include('components.breadcrumb')
            
            <!-- Content Area -->
            <div class="p-6">
                <!-- Flash Messages -->
                @include('components.alert')
                
                <!-- Page Content -->
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Vite JS -->
    @vite(['resources/js/app.js'])
</body>
</html>
