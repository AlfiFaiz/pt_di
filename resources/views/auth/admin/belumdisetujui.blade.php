@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('components.sidebaradmin')
        
        <div class="flex-1 p-6">
            @include('components.headeradmin')
            <div class="p-6">
                <h2 class="text-2xl font-bold">Manajemen Akun</h2>
    
                @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mt-4">
                        {{ session('success') }}
                    </div>
                @endif
<!-- Tabel Pengguna Belum Disetujui -->
<div class="mt-6 bg-white p-4 shadow rounded-lg">
    <h3 class="font-semibold text-lg mb-4">Belum Disetujui</h3>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-blue-600 text-white">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Role</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users->where('is_approved', false) as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('admin.approve', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Setujui</button>
                        </form>
                        <button onclick="confirmDelete({{ $user->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-4">Tidak ada akun yang menunggu persetujuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

                </div>
                
            </div>
            </div>
    <!-- Modal Edit User -->
    <div id="editUserModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4">Edit User</h2>
            <form id="editUserForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="editName" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" name="email" class="w-full p-2 border rounded">
                </div>
                <select id="editRole" name="role" class="w-full p-2 border rounded">
                    <option value='Customer'>Customer</option>
                    <option value='admin'>Admin</option>
                </select>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Popup Konfirmasi Hapus -->
    <div id="confirmDeleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96 text-center">
            <h2 class="text-xl font-bold text-red-600">Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus akun ini?</p>
            <div class="mt-4 flex justify-center space-x-2">
                <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function openEditModal(id, name, email, role) {
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editUserForm').action = "/admin/users/" + id + "/edit";
            document.getElementById('editUserModal').classList.remove('hidden');
        }
    
        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
        }
    
        function confirmDelete(id) {
            document.getElementById('deleteForm').action = "/admin/users/" + id + "/delete";
            document.getElementById('confirmDeleteModal').classList.remove('hidden');
        }
    
        function closeDeleteModal() {
            document.getElementById('confirmDeleteModal').classList.add('hidden');
        }
    </script>

@endsection
