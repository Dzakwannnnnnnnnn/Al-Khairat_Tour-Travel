@extends('layouts.layout')

@section('title', 'Users - Al-Khairat')
@section('breadcrumb', 'Manajemen User')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center space-x-6">
                    <div class="p-4 bg-orange/10 text-orange rounded-2xl hidden md:block">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Manajemen Users</h1>
                        <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola semua user sistem dan hak akses.</p>
                    </div>
                </div>
                <button onclick="document.getElementById('addUserModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah User</span>
                </button>
            </div>
        </div>

        <div class="mb-8">
            <form method="GET" action="{{ route('users.index') }}">
                <div class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama atau email..."
                        class="w-full border border-slate-200 dark:border-slate-800 rounded-[1.2rem] px-6 py-3.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-white dark:bg-slate-900 shadow-sm transition-all text-slate-800 dark:text-slate-100 placeholder:text-slate-400">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 dark:text-slate-600 group-focus-within:text-orange transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </form>
        </div>


        <!-- Users Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($users as $user)
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-sm p-6 hover:bg-slate-50 dark:hover:bg-slate-800/40 hover:shadow-xl hover:border-orange/20 border border-slate-100 dark:border-slate-800 transition-all duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-14 h-14 rounded-2xl object-cover border-2 border-white dark:border-slate-800 shadow-md">
                    <div class="flex-1 min-w-0">
                        <h3 class="font-black text-slate-800 dark:text-slate-100 truncate">{{ $user->name }}</h3>
                        <p class="text-xs font-bold text-slate-400 dark:text-slate-500 truncate">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="space-y-3 mb-6 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-100 dark:border-slate-700/50">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Role Sistem</span>
                        <span class="inline-block px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest {{ $user->role === 'admin' ? 'bg-orange/10 text-orange' : 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400' }}">
                            {{ $user->role }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Status Akses</span>
                        <span class="inline-block bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest">Aktif</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Sejak</span>
                        <span class="text-[10px] font-black text-slate-700 dark:text-slate-300 uppercase">{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button onclick="openEditUser({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->role }}')"
                        class="inline-flex flex-1 items-center justify-center px-3 py-1.5 bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-800 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm hover:bg-amber-100 dark:hover:bg-amber-900/50 hover:shadow-md hover:shadow-amber-500/10 dark:hover:shadow-amber-900/30 hover:scale-[1.02] active:scale-95 transition-all duration-200 touch-manipulation">Edit Profile</button>                    @if($user->id !== auth()->id())
                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="flex-1 m-0" onsubmit="return confirm('Yakin hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-1.5 bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-800 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/40 hover:animate-shake active:scale-95 active:bg-red-200 dark:active:bg-red-800 active:shadow-red-400/30 transition-all duration-200 touch-manipulation">Terminate</button>
                    </form>
                    @else
                    <span class="flex-1 inline-flex items-center justify-center px-3 py-1.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 rounded-lg text-[10px] uppercase tracking-widest font-bold leading-tight">(Current Admin)</span>
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
    <div id="addUserModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-md p-8 border border-slate-100 dark:border-slate-800">
            <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah User Baru</h3>
                <button onclick="document.getElementById('addUserModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Nama</label>
                    <input type="text" name="name" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100" placeholder="Nama lengkap">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100" placeholder="email@contoh.com">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Password</label>
                    <input type="password" name="password" required minlength="8" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Role</label>
                    <select name="role" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-6 border-t border-slate-50 dark:border-slate-800">
                    <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')" class="flex-1 px-4 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-4 bg-emerald-600 dark:bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 border-b-4 border-emerald-800 dark:border-emerald-900 font-black uppercase tracking-widest text-[10px] touch-manipulation">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-md p-8 border border-slate-100 dark:border-slate-800">
            <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit User Profile</h3>
                <button onclick="document.getElementById('editUserModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form id="editUserForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Nama</label>
                    <input type="text" name="name" id="editName" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Email</label>
                    <input type="email" name="email" id="editEmail" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Password Baru (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" minlength="8" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100" placeholder="Kosongkan jika tidak diubah">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Role</label>
                    <select name="role" id="editRole" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="document.getElementById('editUserModal').classList.add('hidden')" class="flex-1 px-4 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-4 bg-emerald-500 dark:bg-emerald-700 text-white rounded-2xl shadow-md shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:bg-emerald-400 dark:hover:bg-emerald-600 hover:shadow-lg hover:shadow-emerald-400/40 dark:hover:shadow-emerald-800/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-emerald-300/50 dark:active:shadow-emerald-700/60 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Simpan Perubahan</button>
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
