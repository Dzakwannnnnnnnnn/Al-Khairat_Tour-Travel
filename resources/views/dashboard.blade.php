@extends('layouts.layout')

@section('title', 'Dashboard - Al-Khairat')
@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome to Dashboard</h1>
            <p class="text-gray-600 mt-2">Here's what's happening with your business today.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Revenue Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">$12,345</p>
                        <p class="text-green-600 text-sm mt-2">↑ 12% from last month</p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Users</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">1,234</p>
                        <p class="text-red-600 text-sm mt-2">↓ 5% from last month</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 12a6 6 0 11-12 0 6 6 0 0112 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">456</p>
                        <p class="text-green-600 text-sm mt-2">↑ 23% from last month</p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 2a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V2zm0 6a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm1-1h12v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Conversion Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Conversion Rate</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">3.24%</p>
                        <p class="text-green-600 text-sm mt-2">↑ 0.5% from last month</p>
                    </div>
                    <div class="bg-red-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Chart -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Revenue Overview</h2>
                <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                    <p class="text-gray-500">Chart placeholder</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                        <p class="text-sm text-gray-600">New user registered</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                        <p class="text-sm text-gray-600">Order completed</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-purple-600 rounded-full"></div>
                        <p class="text-sm text-gray-600">Product uploaded</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-yellow-600 rounded-full"></div>
                        <p class="text-sm text-gray-600">Report generated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
