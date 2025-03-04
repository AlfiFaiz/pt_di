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
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-700 p-5 text-white">
            <h1 class="text-xl font-bold">Admin</h1>
            <nav class="mt-6">
                <ul>
                    <li class="mb-4 flex items-center space-x-2">
                        <span>📌</span>
                        <a href="#" class="hover:text-gray-300">Tentang Dashboard</a>
                    </li>
                    <li class="mb-4 flex items-center space-x-2">
                        <span>📂</span>
                        <a href="#" class="hover:text-gray-300">Tambah Data</a>
                    </li>
                    <li class="mb-4 flex items-center space-x-2">
                        <span>📊</span>
                        <a href="#" class="hover:text-gray-300">Rekap Data</a>
                    </li>
                    <li class="mb-4 flex items-center space-x-2">
                        <span>👤</span>
                        <a href="{{ route('admin.users') }}" class="hover:text-gray-300">Manajemen Akun</a>
                    </li>
                    
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div class="relative w-full max-w-lg">
                    <input type="text" placeholder="Cari data yang diinginkan.." class="w-full p-2 rounded border">
                </div>
                <div class="relative">
                    <button id="userDropdown" class="bg-blue-500 text-white p-2 rounded flex items-center space-x-2 focus:outline-none">
                        <span>Hi, {{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
                        <p class="block px-4 py-2 text-gray-700 font-semibold">Role: {{ Auth::user()->role }}</p>
                        <hr class="border-gray-200">
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
                
            </div>

            <!-- Dashboard Cards -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 shadow-md rounded-lg">
                    <h2 class="font-bold">Tentang Dashboard</h2>
                    <p class="text-gray-600">Deskripsi singkat tentang dashboard</p>
                </div>
                <div class="bg-white p-4 shadow-md rounded-lg">
                    <h2 class="font-bold">Data Pesawat</h2>
                    <canvas id="donutChart"></canvas>
                </div>
                <div class="bg-white p-4 shadow-md rounded-lg col-span-2">
                    <h2 class="font-bold">Progres</h2>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    </div>

<script>
    document.getElementById("userDropdown").addEventListener("click", function() {
        document.getElementById("dropdownMenu").classList.toggle("hidden");
    });

    document.addEventListener("click", function(event) {
        var dropdown = document.getElementById("dropdownMenu");
        var button = document.getElementById("userDropdown");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>

</body>
</html>

@endsection
