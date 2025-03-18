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
        @include('components.sidebaradmin')
        
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            @include('components.headeradmin')

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



</body>
</html>

@endsection
