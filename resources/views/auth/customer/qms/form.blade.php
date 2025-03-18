@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        <div class="mt-6 bg-white p-4 shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Nomor
                        <th class="p-2 border">Judul</th>
                        <th class="p-2 border">Date Issued</th>
                        <th class="p-2 border">Org</th>
                        <th class="p-2 border">Rev</th>
                        <th class="p-2 border">Amend</th>
                        <th class="p-2 border">Affected Function</th>
                        <th class="p-2 border">File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td class="p-2 border"></td>
                        <td class="p-2 border"></td>
                        <td class="p-2 border"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
