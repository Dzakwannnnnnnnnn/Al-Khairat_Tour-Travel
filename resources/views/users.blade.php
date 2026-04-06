@extends('layouts.layout')

@section('title', 'Users - Al-Khairat')
@section('breadcrumb', 'Users')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Users Management</h1>
                <p class="text-gray-600 mt-2">Manage system users and their roles</p>
            </div>
            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                <span>Add User</span>
            </button>
        </div>

        <!-- Search -->
        <div class="mb-6">
            <input type="text" placeholder="Search by name or email..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Users Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- User Card 1 -->
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=John+Doe" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-gray-900">John Doe</h3>
                        <p class="text-sm text-gray-600">john@example.com</p>
                    </div>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Role:</span>
                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">Admin</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Status:</span>
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Active</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Joined:</span>
                        <span class="text-sm text-gray-900">Jan 15, 2024</span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 text-indigo-600 hover:text-indigo-900 font-medium text-sm">Edit</button>
                    <button class="flex-1 text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                </div>
            </div>

            <!-- User Card 2 -->
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Jane+Smith" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-gray-900">Jane Smith</h3>
                        <p class="text-sm text-gray-600">jane@example.com</p>
                    </div>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Role:</span>
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Manager</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Status:</span>
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Active</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Joined:</span>
                        <span class="text-sm text-gray-900">Feb 20, 2024</span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 text-indigo-600 hover:text-indigo-900 font-medium text-sm">Edit</button>
                    <button class="flex-1 text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                </div>
            </div>

            <!-- User Card 3 -->
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Mike+Johnson" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-gray-900">Mike Johnson</h3>
                        <p class="text-sm text-gray-600">mike@example.com</p>
                    </div>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Role:</span>
                        <span class="inline-block bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs font-semibold">User</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Status:</span>
                        <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">Inactive</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Joined:</span>
                        <span class="text-sm text-gray-900">Mar 10, 2024</span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 text-indigo-600 hover:text-indigo-900 font-medium text-sm">Edit</button>
                    <button class="flex-1 text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection
