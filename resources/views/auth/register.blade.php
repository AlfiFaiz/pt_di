@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-40"></div>

    <div class="relative bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-blue-600 font-bold text-lg">DAFTAR AKUN</h2>
        <h1 class="text-2xl font-bold text-gray-900">QUALITY AND SAFETY</h1>
        <p class="text-sm text-gray-700 mt-1">Daftarkan akun sebelum login ke halaman utama!</p>

        <form action="{{ route('register') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700">Daftar</button>
                <button type="reset" class="w-full mt-2 border border-blue-600 text-blue-600 font-semibold py-2 rounded-lg hover:bg-blue-100">Reset</button>
                <a href="{{ url('/') }}" class="w-full block mt-2 bg-green-600 text-white text-center font-semibold py-2 rounded-lg hover:bg-green-700">Home</a>
            </div>
        </form>
    </div>
</div>
@endsection
