@extends('layouts.app')
@include('components.navbar')

@section('content')

<!-- Hero Section -->
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">


    <div class="flex items-center justify-center min-h-screen text-center px-4">
        <div class="max-w-5xl">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white">
                "When everything seems to be going against you, <br>remember that the airplane takes off against the wind, not with it."
            </h1>
            <br>
            <h2 class="text-2xl sm:text-4xl md:text-4xl font-extrabold">
                - Henry Ford -
            </h2>
        </div>
    </div>
    


</div>

@endsection
