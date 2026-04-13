@extends('layouts.layout')

@section('title', 'Users - Al-Khairat')
@section('breadcrumb', 'Users')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Manajemen Users</h1>
                <p class="text-gray-600 mt-2">Kelola semua user sistem</p>
            </div>
            <button onclick="document.getElementById('addUserModal').classList.remove('hidden')" class="bg-charcoal text-white px-6 py-2 rounded-lg hover:bg-orange transition flex items-center space-x-2 shadow-lg shadow-orange/10">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-bold uppercase tracking-widest text-xs">Tambah User</span>
            </button>

        </div>

        <div class="mb-8">
            <form method="GET" action="{{ route('users.index') }}">
                <div class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama atau email..."
                        class="w-full border border-slate-200 rounded-[1.2rem] px-6 py-3.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-white shadow-sm transition-all">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 group-hover:text-orange transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </form>
        </div>


        <!-- Users Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($users as $user)
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=E07856&color=fff" alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Role:</span>
                        <span class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $user->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Status:</span>
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Active</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Bergabung:</span>
                        <span class="text-sm text-gray-900">{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100">
                    <button onclick="openEditUser({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->role }}')"
                        class="inline-flex flex-1 items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Edit Profile</button>
                    @if($user->id !== auth()->id())
                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="flex-1 m-0" onsubmit="return confirm('Yakin hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Terminate</button>
                    </form>
                    @else
                    <span class="flex-1 inline-flex items-center justify-center px-3 py-1.5 bg-slate-50 text-slate-400 rounded-lg text-[10px] uppercase tracking-widest font-bold leading-tight">(Current Admin)</span>
                    @endif
                </div>

            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada user.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Tambah User Baru</h3>
                <button onclick="document.getElementById('addUserModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Nama lengkap">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="email@contoh.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required minlength="8" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Role</label>
                    <select name="role" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-2">
                    <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Edit User</h3>
                <button onclick="document.getElementById('editUserModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form id="editUserForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" id="editName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="editEmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" minlength="8" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Kosongkan jika tidak diubah">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Role</label>
                    <select name="role" id="editRole" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="document.getElementById('editUserModal').classList.add('hidden')" class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-500 rounded-xl hover:bg-slate-50 transition font-bold uppercase tracking-widest text-[10px]">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2.5 bg-charcoal text-white rounded-xl hover:bg-orange transition font-bold uppercase tracking-widest text-[10px] shadow-lg shadow-orange/10">Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function openEditUser(id, name, email, role) {
            document.getElementById('editUserForm').action = '/users/' + id;
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editUserModal').classList.remove('hidden');
        }
    </script>
@endsection
