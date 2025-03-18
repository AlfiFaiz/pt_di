@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold">Tambah Form</h2>

    <div class="bg-white p-6 rounded shadow-md mt-4">
        <form action="{{ route('admin.qms.form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Nomor</label>
                <input type="text" name="nomor" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Date Issued</label>
                <input type="date" name="date_issued" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Org</label>
                <input type="text" name="org" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Rev</label>
                <input type="number" name="rev" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Amend</label>
                <input type="number" name="amend" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Affected Function</label>
                <input type="text" name="affected_function" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Type</label>
                <select name="type" class="w-full border p-2 rounded" required>
                    <option value="FORM">FORM</option>
                    <option value="MANUAL">MANUAL</option>
                    <option value="PROCEDURE">PROCEDURE</option>
                    <option value="WORK INSTRUCTION">WORK INSTRUCTION</option>
                    <option value="PERSONAL ROSTER">PERSONAL ROSTER</option>
                    <option value="TRAINING">TRAINING</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Upload File</label>
                <input type="file" name="file" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('admin.qms.form') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
