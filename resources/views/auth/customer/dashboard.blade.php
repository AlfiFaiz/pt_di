@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    


    <div class="flex items-center justify-center min-h-screen text-center px-4">
        <div class="flex flex-col items-center justify-center h-[80vh] text-center">
            <h1 class="text-center text-white text-2xl sm:text-3xl md:text-4xl font-bold uppercase mb-8">
                CAPABILITIES
            </h1>  
            <p class="text-lg mt-2">QUALITY PLANNING AND CERTIFICATION</p>
            <p class="mt-2">Masukkan Nomor WBS anda untuk melihat data Pesawat anda!</p>
            
            <form action="{{ route('progress') }}" method="GET" class="mt-6 flex bg-white shadow-md rounded-lg overflow-hidden w-[500px]">
                <input type="text" name="search" placeholder="contoh : 4/U90-220AS332-01-02-01-01" class="w-full p-3 text-gray-700 focus:outline-none">
                <button type="submit" class="bg-blue-600 px-4 py-3 text-white hover:bg-blue-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0a8 8 0 10-11.3 0 8 8 0 0011.3 0z"></path>
                    </svg>
                </button>
            </form>
            
        </div>
    </div>
    


</div>


@endsection
