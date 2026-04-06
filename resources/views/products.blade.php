@extends('layouts.layout')

@section('title', 'Products - Al-Khairat')
@section('breadcrumb', 'Products')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Products</h1>
                <p class="text-gray-600 mt-2">Manage all your products in one place</p>
            </div>
            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                <span>Add Product</span>
            </button>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" placeholder="Search products..." class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Fashion</option>
                    <option>Home</option>
                </select>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
                <button class="bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Filter
                </button>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Product Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">Wireless Headphones</p>
                            <p class="text-sm text-gray-600">SKU: WH-001</p>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Electronics</td>
                        <td class="px-6 py-4 font-semibold text-gray-900">$99.99</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">45</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Active</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">USB-C Cable</p>
                            <p class="text-sm text-gray-600">SKU: UC-002</p>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Electronics</td>
                        <td class="px-6 py-4 font-semibold text-gray-900">$19.99</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">12</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Active</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">Smartphone Case</p>
                            <p class="text-sm text-gray-600">SKU: SC-003</p>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Accessories</td>
                        <td class="px-6 py-4 font-semibold text-gray-900">$29.99</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">0</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Inactive</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-between items-center">
            <p class="text-gray-600">Showing 1-3 of 15 products</p>
            <div class="flex space-x-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Previous</button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">1</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">2</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Next</button>
            </div>
        </div>
    </div>
@endsection
