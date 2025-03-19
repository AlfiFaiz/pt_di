@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
            @foreach ($aircraftPrograms as $program)
                <div class="bg-blue-900 bg-opacity-80 shadow-lg rounded-lg p-4 w-full mx-auto transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="flex flex-row items-center gap-x-6">
                        <!-- Gambar -->
                        <div class="w-1/2"> <!-- Tambahkan padding agar lebih rapi -->
                            <img src="{{ asset('storage/aircrafts/' . $program->image) }}" alt="Image" class="w-full h-auto object-cover rounded-md">
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="w-1/2 flex flex-col justify-center items-center relative p-2">
                            <canvas class="progressChart" data-progress="" class="w-24 h-24"></canvas>
                            <div class="absolute text-xl font-bold text-white text-center progressText">
                            
                            </div>
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <div class="mt-4 text-white">
                        <p class="font-semibold">{{ $program->program }}</p>
                        <p>{{ $program->aircraft_type }}</p>
                        <p>{{ $program->registration }}</p>
                        <p>{{ $program->customer }}</p>
                    </div>

                    <!-- Tombol Detail -->
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('project.show', $program->id) }}" class="bg-black text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-800">
                            Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".progressChart").forEach(canvas => {
            var progressValue = canvas.getAttribute("data-progress");
            var ctx = canvas.getContext('2d');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [progressValue, 100 - progressValue],
                        backgroundColor: ['#00C853', '#2962FF'],
                        borderWidth: 0,
                        circumference: 180,
                        rotation: 270
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                }
            });
        });
    });
</script>
@endsection
