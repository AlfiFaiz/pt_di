@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-40"></div>

    <div class="relative bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-blue-600 font-bold text-lg">DAFTAR AKUN</h2>
        <h1 class="text-2xl font-bold text-gray-900">QUALITY AND SAFETY</h1>
        <p class="text-sm text-gray-700 mt-1">Daftarkan akun sebelum login ke halaman utama!</p>

        <!-- Notifikasi Popup -->
        @if(session('success'))
        <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-green-600 text-lg font-bold">Berhasil!</h2>
                <p class="text-gray-700">{{ session('success') }}</p>
                <button onclick="closePopup()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">OK</button>
            </div>
        </div>
        <script>
            function closePopup() {
                document.getElementById('successPopup').style.display = 'none';
                window.location.href = "{{ route('login') }}"; // Redirect ke login
            }
        </script>
        @endif
       @if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
        @error('password')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
    </div>

    <div class="mt-6">
        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700">Daftar</button>
        <a href="{{ url('/') }}" class="w-full block mt-2 bg-green-600 text-white text-center font-semibold py-2 rounded-lg hover:bg-green-700">HOME</a>
    </div>
</form>
</div>
</div>

@endsection
