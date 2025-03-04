@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="bg-blue-700 text-white py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-16">
        </div>
        <!-- Dropdown User -->
<div class="relative">
    <!-- Tombol Dropdown -->
    <button id="userDropdown" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none">
        <img src="https://via.placeholder.com/30" alt="Profile" class="w-8 h-8 rounded-full">
        <span>Hi, {{ Auth::user()->name }}</span>
        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Menu Dropdown -->
    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg hidden">
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
        </form>
    </div>
</div>
    </div>

    <div class="flex flex-col items-center justify-center h-[80vh] text-center">
        <h1 class="text-center text-white text-2xl sm:text-3xl md:text-4xl font-bold uppercase mb-8">
            CAPABILITIES
        </h1>  
        <p class="text-lg mt-2">QUALITY PLANNING AND CERTIFICATION</p>
        <p class="mt-2">Masukkan Nomor WBS anda untuk melihat data Pesawat anda!</p>
        
        <div class="mt-6 flex bg-white shadow-md rounded-lg overflow-hidden w-[500px]">
            <input type="text" placeholder="contoh : 4/U90-220AS332-01-02-01-01" class="w-full p-3 text-gray-700 focus:outline-none">
            <button class="bg-blue-600 px-4 py-3 text-white hover:bg-blue-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0a8 8 0 10-11.3 0 8 8 0 0011.3 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
<script>
    document.getElementById("userDropdown").addEventListener("click", function(event) {
        event.stopPropagation();
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
@endsection
