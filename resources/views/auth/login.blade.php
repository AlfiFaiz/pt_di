@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-40"></div>

    <div class="relative bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-blue-600 font-bold text-lg">LOGIN AKUN</h2>
        <h1 class="text-2xl font-bold text-gray-900">QUALITY AND SAFETY</h1>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 rounded-md mt-2 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div class="flex justify-between text-sm">
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Tidak punya akun? Daftar</a>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700">Login</button>
                <a href="{{ url('/') }}" class="w-full block mt-2 bg-green-600 text-white text-center font-semibold py-2 rounded-lg hover:bg-green-700">HOME</a>
            </div>
        </form>
    </div>
</div>
@endsection
