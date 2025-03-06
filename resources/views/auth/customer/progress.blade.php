@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    
    @php
        $progressValue = 75; // Ubah nilai ini untuk mengganti progress
    @endphp

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Progress Bar</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#0C1B3A] text-white">
    
        <!-- Judul -->
        <div class="text-center mt-10">
            <h1 class="text-3xl font-extrabold">QUALITY PLANNING AND CERTIFICATION</h1>
        </div>

        <!-- Progress Bar -->
        <div class="flex justify-center items-center mt-10">
            <canvas id="progressChart" width="300" height="150"></canvas>
        </div>
    
        <!-- Tabel -->
        <div class="flex justify-center mt-10">
            <table class="w-4/5 text-center border-collapse border border-gray-600">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border border-gray-600 px-4 py-2">Contract no</th>
                        <th class="border border-gray-600 px-4 py-2">Program</th>
                        <th class="border border-gray-600 px-4 py-2">A/C Type</th>
                        <th class="border border-gray-600 px-4 py-2">A/C Owner</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-black">
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">XXXXXXXXXXXXXXXXXX</td>
                        <td class="border border-gray-600 px-4 py-2">XXXXXXXXXXXXXXXXXX</td>
                        <td class="border border-gray-600 px-4 py-2">XXXXXXXXXXXXXXXXXX</td>
                        <td class="border border-gray-600 px-4 py-2">XXXXXXXXXXXXXXXXXX</td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <!-- Tombol Detail -->
        <div class="flex justify-center mt-6">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Detail
            </button>
        </div>
        @php
        $progressValue = 15;//Ubah angka ini sesuai keinginan
    @endphp
    
        <!-- Script untuk Chart.js -->
        <script>
            var ctx = document.getElementById('progressChart').getContext('2d');
            var progressValue = {{ $progressValue }}; // Ambil nilai dari PHP

            var progressChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [progressValue, 100 - progressValue], // Sesuai input dari PHP
                        backgroundColor: ['#00C853', '#2962FF'],
                        borderWidth: 0,
                        circumference: 180,
                        rotation: 270
                    }]
                },
                options: {
                    responsive: false,
                    cutout: '75%',
                    plugins: {
                        doughnutlabel: {
                            labels: [
                                {
                                    text: progressValue + '%',
                                    font: { size: '30', weight: 'bold' },
                                    color: '#fff'
                                }
                            ]
                        }
                    }
                }
            });
        </script>
    
    </body>
    </html>
</div>
@endsection
