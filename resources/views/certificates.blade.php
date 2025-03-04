@extends('layouts.app')
@include('components.navbar')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
  <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        <h1 class="text-center text-white text-2xl sm:text-3xl md:text-4xl font-bold uppercase mb-8">
            CERTIFICATE
        </h1>  
        
        <!-- Grid untuk Responsivitas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
            <!-- Sertifikat 1 -->
            <div class="bg-blue-900 bg-opacity-80 shadow-lg rounded-lg p-2 w-full sm:w-200 mx-auto transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="{{ asset('images/certificate1.png') }}" alt="Certificate 1" 
                    class="w-full h-auto object-cover rounded-md">
                <p class="text-white text-center mt-2 font-semibold">Sertifikat Keahlian</p>
            </div>

            <!-- Sertifikat 2 -->
            <div class="bg-blue-900 bg-opacity-80 shadow-lg rounded-lg p-2 w-full sm:w-200 mx-auto transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="{{ asset('images/certificate2.png') }}" alt="Certificate 2" 
                    class="w-full h-auto object-cover rounded-md">
                <p class="text-white text-center mt-2 font-semibold">Sertifikat Keahlian</p>
            </div>

            <!-- Sertifikat 3 -->
            <div class="bg-blue-900 bg-opacity-80 shadow-lg rounded-lg p-2 w-full sm:w-200 mx-auto transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="{{ asset('images/certificate3.png') }}" alt="Certificate 3" 
                    class="w-full h-auto object-cover rounded-md">
                <p class="text-white text-center mt-2 font-semibold">Sertifikat Keahlian</p>
            </div>
        </div>
    </div>
</div>
@endsection
