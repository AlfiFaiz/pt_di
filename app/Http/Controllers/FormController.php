<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    // Menampilkan daftar form
    public function index()
    {
        $limit = request('limit', 5); // Default 5 jika tidak dipilih
$forms = Form::paginate($limit == 'all' ? Form::count() : $limit);

        return view('auth.admin.qms.form', compact('forms'));
    }

    // Menampilkan halaman tambah form
    public function create()
    {
        return view('auth.admin.qms.form-create');
    }

    // Menyimpan form ke database
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'date_issued' => 'required|date',
            'org' => 'required|string|max:255',
            'rev' => 'required|integer',
            'amend' => 'nullable|integer',
            'affected_function' => 'required|string|max:255',
            'type' => 'required|string|in:FORM,MANUAL,PROCEDURE,WORK INSTRUCTION,PERSONAL ROSTER,TRAINING',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file ke storage
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('qms', 'public');
        }

        // Simpan data ke database
        Form::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'date_issued' => $request->date_issued,
            'org' => $request->org,
            'rev' => $request->rev,
            'amend' => $request->amend,
            'affected_function' => $request->affected_function,
            'type' => $request->type,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.qms.form')->with('success', 'Form berhasil ditambahkan!');
    }

    // Menampilkan halaman edit form
    public function edit(Form $form)
    {
        return view('auth.admin.qms.form-edit', compact('form'));
    }

    // Update data form
    public function update(Request $request, Form $form)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'date_issued' => 'required|date',
            'org' => 'required|string|max:255',
            'rev' => 'required|integer',
            'amend' => 'nullable|integer',
            'affected_function' => 'required|string|max:255',
            'type' => 'required|string|in:FORM,MANUAL,PROCEDURE,WORK INSTRUCTION,PERSONAL ROSTER,TRAINING',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Jika ada file baru, hapus file lama
        if ($request->hasFile('file')) {
            if ($form->file_path) {
                Storage::disk('public')->delete($form->file_path);
            }
            $filePath = $request->file('file')->store('qms', 'public');
        } else {
            $filePath = $form->file_path;
        }

        // Update data form
        $form->update([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'date_issued' => $request->date_issued,
            'org' => $request->org,
            'rev' => $request->rev,
            'amend' => $request->amend,
            'affected_function' => $request->affected_function,
            'type' => $request->type,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.qms.form')->with('success', 'Form berhasil diperbarui!');
    }

    // Hapus form
    public function destroy(Form $form)
    {
        if ($form->file_path) {
            Storage::disk('public')->delete($form->file_path);
        }
        $form->delete();

        return redirect()->route('admin.qms.form')->with('success', 'Form berhasil dihapus!');
    }


}
