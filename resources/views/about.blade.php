@extends('layouts.app')
@include('components.navbar')

@section('content')
<div class="bg-[#0B163B] text-white">

    <!-- About Us -->
    <div class="container mx-auto py-8 sm:py-12 text-center px-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold">ABOUT US</h1>
        <p class="mt-2 text-lg font-semibold">Meet our Team</p>
        <p class="mt-4 text-md max-w-3xl mx-auto">
            It takes dedicated, capable, and experienced leaders to ensure Strategic Business Unit Aircraft Services PT Dirgantara Indonesia stays a global leader in the aviation industry for many years to come. We are confident we have the right team in place to continue positive growth of the company.
        </p>
    </div>

    <!-- Struktur Organisasi -->
    <div class="container mx-auto py-8 sm:py-12 text-center px-4">
        <h2 class="text-2xl sm:text-3xl font-bold">OUR STRUCTURE</h2>
        <div class="flex justify-center mt-6">
            <img src="{{ asset('images/struktur.png') }}" class="w-full max-w-4xl sm:max-w-5xl rounded-lg shadow-lg" alt="Struktur Organisasi">
        </div>
    </div>
    
    <hr class="my-8 border-t-2 border-gray-400 mx-auto w-3/4">

    <!-- Lokasi -->
    <div class="container mx-auto py-8 sm:py-12 text-center px-4">
        <h2 class="text-2xl sm:text-3xl font-bold">OUR LOCATION</h2>
        <p class="mt-2">CBC Building 1st Floor, KP IV, Jl. Pajajaran No 154 Bandung, West Java</p>

        <div class="flex flex-col md:flex-row justify-center mt-6 space-y-6 md:space-y-0 md:space-x-6">
            <!-- Google Maps Embed -->
            <iframe 
                class="w-full sm:w-100 h-150 rounded-lg shadow-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.4847197039408!2d107.57238208925654!3d-6.894258900000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e678a5ac2149%3A0x4a5e4b838d97e455!2sPT%20Dirgantara%20Indonesia%20KP4!5e0!3m2!1sid!2sid!4v1740978766720!5m2!1sid!2sid"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <!-- Gambar Gedung -->
            <img src="{{ asset('images/building.png') }}" class="w-full sm:w-100 rounded-lg shadow-lg" alt="Building">
        </div>
    </div>
    
    <hr class="my-8 border-t-2 border-gray-400 mx-auto w-3/4">

    <!-- Kontak -->
    <div class="container mx-auto py-8 sm:py-12 text-center px-4">
        <h2 class="text-2xl sm:text-3xl font-bold">OUR CONTACT</h2>
        
        <div class="mt-4">
            <p class="text-lg font-semibold">📧 Email:</p>
            <p class="text-blue-400">marketing-ptdi@indonesian-aerospace.com</p>
            <p class="text-blue-400">sekretariat-ptdi@indonesian-aerospace.com</p>
        </div>

        <div class="mt-4">
            <p class="text-lg font-semibold">📞 Phone:</p>
            <p class="text-blue-400">+62 22 6055030 | +62 22 6055031</p>
        </div>
    </div>
</div>
@endsection
