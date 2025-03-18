@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
   
          
          <!-- Grid untuk Responsivitas -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
              <!-- Sertifikat 1 -->
              <div class="bg-blue-900 bg-opacity-80 shadow-lg rounded-lg p-2 w-full sm:w-200 mx-auto transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <a href="{{ route('auth/customer/qms/form') }}" ">
                    <img src="" alt="IMAGE 1" 
                    class="w-full h-auto object-cover rounded-md">
                    <p class="text-white text-center mt-2 font-semibold">FORM</p>
                </a>
                </div>

          </div>
      </div>
  </div>


@endsection
