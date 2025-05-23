@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        
        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Cari pesawat..." 
                class="w-full p-3 border border-gray-400 rounded-lg focus:ring focus:ring-blue-300" 
                onkeyup="searchAircrafts()">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="aircraftContainer">
            @php
                use App\Models\EngineeringOrder;
            @endphp

            @foreach ($aircraftPrograms as $program)
                @php
                    // Hitung progress
                    $orders = EngineeringOrder::where('aircraft_id', $program->id)->get();
                    $totalOrders = $orders->count();
                    $completedOrders = $orders->whereNotNull('finish_date')->whereNotNull('insp_stamp')->count();
                    $progressPercentage = ($totalOrders > 0) ? round(($completedOrders / $totalOrders) * 100, 2) : 0;
                @endphp

                <div class="bg-blue-900 bg-opacity-80 shadow-md rounded-lg p-3 flex flex-col gap-3 aircraft-item"
                    data-program="{{ strtolower($program->program) }}"
                    data-type="{{ strtolower($program->aircraft_type) }}"
                    data-registration="{{ strtolower($program->registration) }}"
                    data-customer="{{ strtolower($program->customer) }}">
                    
                    <!-- Gambar & Progress -->
                    <div class="flex items-center gap-3">
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $program->image) }}" alt="Image" class="w-20 h-20 object-cover rounded-lg shadow-md">
                        
                        <!-- Progress Bar -->
                        <div class="flex-1">
                            <div class="w-full bg-gray-700 rounded-full h-4">
                                <div class="bg-green-500 h-4 rounded-full transition-all duration-300" style="width: {{ $progressPercentage }}%;"></div>
                            </div>
                            <p class="text-xs text-white mt-1 text-right">{{ $progressPercentage }}%</p>
                        </div>
                    </div>

                    <!-- Informasi Pesawat -->
                    <div class="text-white text-sm">
                        <p class="font-semibold">{{ $program->program }}</p>
                        <p>{{ $program->aircraft_type }} | {{ $program->registration }}</p>
                        <p class="text-gray-300">{{ $program->customer }}</p>
                    </div>

                    <!-- Tombol Detail -->
                    <a href="{{ route('project.detail', $program->id) }}" class="bg-black text-white px-3 py-1 rounded-lg text-xs text-center hover:bg-gray-800">
                        Detail
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- SCRIPT SEARCH -->
<script>
    function searchAircrafts() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let aircrafts = document.querySelectorAll(".aircraft-item");

        aircrafts.forEach(aircraft => {
            let program = aircraft.getAttribute("data-program");
            let type = aircraft.getAttribute("data-type");
            let registration = aircraft.getAttribute("data-registration");
            let customer = aircraft.getAttribute("data-customer");

            if (program.includes(input) || type.includes(input) || registration.includes(input) || customer.includes(input)) {
                aircraft.style.display = "block";
            } else {
                aircraft.style.display = "none";
            }
        });
    }
</script>
@endsection
