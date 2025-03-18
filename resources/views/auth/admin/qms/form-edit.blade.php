@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6">Edit Form</h2>

    <form action="{{ route('admin.qms.form.update', $form->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nomor</label>
            <input type="text" name="nomor" value="{{ $form->nomor }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ $form->judul }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Date Issued</label>
            <input type="date" name="date_issued" value="{{ $form->date_issued }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Org</label>
            <input type="text" name="org" value="{{ $form->org }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Rev</label>
            <input type="text" name="rev" value="{{ $form->rev }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Amend</label>
            <input type="text" name="amend" value="{{ $form->amend }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Affected Function</label>
            <input type="text" name="affected_function" value="{{ $form->affected_function }}" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Type</label>
            <select name="type" class="w-full p-2 border rounded-lg">
                <option value="FORM" {{ $form->type == 'FORM' ? 'selected' : '' }}>FORM</option>
                <option value="MANUAL" {{ $form->type == 'MANUAL' ? 'selected' : '' }}>MANUAL</option>
                <option value="PROCEDURE" {{ $form->type == 'PROCEDURE' ? 'selected' : '' }}>PROCEDURE</option>
                <option value="WORK INSTRUCTION" {{ $form->type == 'WORK INSTRUCTION' ? 'selected' : '' }}>WORK INSTRUCTION</option>
                <option value="PERSONAL ROSTER" {{ $form->type == 'PERSONAL ROSTER' ? 'selected' : '' }}>PERSONAL ROSTER</option>
                <option value="TRAINING" {{ $form->type == 'TRAINING' ? 'selected' : '' }}>TRAINING</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">File</label>
            <input type="file" name="file" class="w-full p-2 border rounded-lg">
            @if($form->file_path)
                <p class="text-sm mt-2">
                    <a href="{{ Storage::url($form->file_path) }}" class="text-blue-500" target="_blank">Lihat File Saat Ini</a>
                </p>
            @endif
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
            Update
        </button>
    </form>
</div>
@endsection
