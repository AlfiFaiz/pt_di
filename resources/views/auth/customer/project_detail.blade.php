@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        <!-- Judul -->
        <div class="text-center mt-4 text-white">
            <h1 class="text-3xl font-extrabold">Engineering Orders for {{ $aircraft->aircraft_type }}</h1>
            <p class="text-lg">{{ $aircraft->registration }} - {{ $aircraft->customer }}</p>
        </div>
        @php
   
        $totalOrders = $orders->count();
        $completedOrders = $orders->whereNotNull('finish_date')->whereNotNull('insp_stamp')->count();
        $progressPercentage = ($totalOrders > 0) ? round(($completedOrders / $totalOrders) * 100, 2) : 0;
    @endphp

<div class="flex-1">
    <div class="w-full bg-gray-700 rounded-full h-4">
        <div class="bg-green-500 h-4 rounded-full transition-all duration-300" style="width: {{ $progressPercentage }}%;"></div>
    </div>
    <p class="text-xs text-white mt-1 text-right">{{ $progressPercentage }}%</p>
</div>

        <!-- Wrapper Scroll -->
        <div class="mt-6 bg-white p-4 rounded-lg shadow-lg">
            <div class="overflow-auto max-h-[400px] border border-gray-600 p-2">
                
                @foreach ($orders->groupBy('type_order') as $type => $group)
                    <!-- Header Type Order -->
                    <h2 class="bg-blue-600 text-white text-lg font-bold px-4 py-2">{{ $type }}</h2>
                    
                    <!-- Tabel -->
                    <table class="w-full border-collapse border border-gray-600 mb-4">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="border border-gray-600 px-4 py-2">No</th>
                                <th class="border border-gray-600 px-4 py-2">Engineering Order No</th>
                                <th class="border border-gray-600 px-4 py-2">Subject Title</th>
                                <th class="border border-gray-600 px-4 py-2">Start Date</th>
                                <th class="border border-gray-600 px-4 py-2">Finish Date</th>
                                <th class="border border-gray-600 px-4 py-2">Insp Stamp</th>
                                <th class="border border-gray-600 px-4 py-2">Remarks</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            @foreach ($group as $index => $order)
                                <tr class="hover:bg-gray-200">
                                    <td class="border border-gray-600 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-600 px-4 py-2">{{ $order->engineering_order_no }}</td>
                                    <td class="border border-gray-600 px-4 py-2">{{ $order->subject_title }}</td>
                                    <td class="border border-gray-600 px-4 py-2">{{ $order->start_date }}</td>
                                    <td class="border border-gray-600 px-4 py-2">{{ $order->finish_date }}</td>
                                    <td class="border border-gray-600 px-4 py-2">{{ $order->insp_stamp }}</td>
                                    <td class="border border-gray-600 px-4 py-2 text-center">
                                        @if ($order->finish_date && $order->insp_stamp)
                                            ✅
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach

            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="flex justify-center mt-6">
            <a href="{{ url()->previous() }}" class="bg-gray-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-900">
                Kembali
            </a>
        </div>
        <div class="flex justify-center mt-4 gap-4">
            <a href="{{ route('engineering-orders.pdf', $aircraft->id) }}" 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-800">
                Download PDF
            </a>
        </div>
        
    </div>
</div>
@endsection
