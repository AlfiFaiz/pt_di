@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
    <h2 class="text-xl font-semibold text-center text-blue-700 mb-4">Edit Form</h2>

    <form action="{{ route('admin.qms.form.update', $form->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Nomor</label>
                <input type="text" name="nomor" value="{{ $form->nomor }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Judul</label>
                <input type="text" name="judul" value="{{ $form->judul }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Date Issued</label>
                <input type="date" name="date_issued" value="{{ $form->date_issued }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Org</label>
                <input type="text" name="org" value="{{ $form->org }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Rev</label>
                <input type="text" name="rev" value="{{ $form->rev }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Amend</label>
                <input type="text" name="amend" value="{{ $form->amend }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-medium mb-1">Affected Function</label>
            <input type="text" name="affected_function" value="{{ $form->affected_function }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-medium mb-1">Type</label>
            <select name="type" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                <option value="FORM" {{ $form->type == 'FORM' ? 'selected' : '' }}>FORM</option>
                <option value="MANUAL" {{ $form->type == 'MANUAL' ? 'selected' : '' }}>MANUAL</option>
                <option value="PROCEDURE" {{ $form->type == 'PROCEDURE' ? 'selected' : '' }}>PROCEDURE</option>
                <option value="WORK INSTRUCTION" {{ $form->type == 'WORK INSTRUCTION' ? 'selected' : '' }}>WORK INSTRUCTION</option>
                <option value="PERSONAL ROSTER" {{ $form->type == 'PERSONAL ROSTER' ? 'selected' : '' }}>PERSONAL ROSTER</option>
                <option value="TRAINING" {{ $form->type == 'TRAINING' ? 'selected' : '' }}>TRAINING</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-medium mb-1">File</label>
            <input type="file" name="file" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
            @if($form->file_path)
                <p class="text-xs mt-2">
                    <a href="{{ Storage::url($form->file_path) }}" class="text-blue-500 hover:underline" target="_blank">Lihat File Saat Ini</a>
                </p>
            @endif
        </div>

        <div class="flex justify-center mt-4">
            <a href="{{ route('admin.qms.form') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
