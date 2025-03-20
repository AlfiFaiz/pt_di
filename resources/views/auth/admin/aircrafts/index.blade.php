@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('components.sidebaradmin')

    <div class="container mx-auto px-6 py-12">
        @include('components.headeradmin')
        <h2 class="text-2xl font-bold mb-6">Manajemen Data Project Pesawat</h2>

        <a href="{{ route('aircrafts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Data</a>

        <!-- Wrapper Scroll -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-auto max-h-[400px] border border-gray-300 p-2">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Program</th>
                            <th class="border px-4 py-2">Tipe Pesawat</th>
                            <th class="border px-4 py-2">Registrasi</th>
                            <th class="border px-4 py-2">Customer</th>
                            <th class="border px-4 py-2">Gambar</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aircrafts as $aircraft)
                        <tr>
                            <td class="border px-4 py-2">{{ $aircraft->program }}</td>
                            <td class="border px-4 py-2">{{ $aircraft->aircraft_type }}</td>
                            <td class="border px-4 py-2">{{ $aircraft->registration }}</td>
                            <td class="border px-4 py-2">{{ $aircraft->customer }}</td>
                            <td class="border px-4 py-2">
                                @if ($aircraft->image)
                                    <img src="{{ asset('storage/' . $aircraft->image) }}" alt="Gambar Pesawat" class="w-24 h-auto rounded">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('admin.aircrafts.detail', $aircraft->id) }}" class="bg-black text-white px-3 py-1 rounded">Detail</a>
                                </td>
                                

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
</div>
@endsection
