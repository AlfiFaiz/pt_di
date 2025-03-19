@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold">{{ $aircraftProgram->program }}</h1>
        <p class="text-gray-700">Tipe Pesawat: {{ $aircraftProgram->aircraft_type }}</p>
        <p class="text-gray-700">Registrasi: {{ $aircraftProgram->registration }}</p>
        <p class="text-gray-700">Customer: {{ $aircraftProgram->customer }}</p>
        <img src="{{ asset('storage/aircrafts/' . $aircraftProgram->image) }}" alt="Image" class="w-full h-auto mt-4 rounded-md">
        <a href="{{ route('auth/customer/project') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>
</div>
@endsection
