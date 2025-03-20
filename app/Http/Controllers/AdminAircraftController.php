<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;
use App\Models\EngineeringOrder;


class AdminAircraftController extends Controller {
    public function index() {
        $aircrafts = AircraftProgram::all();
        return view('auth.admin.aircrafts.index', compact('aircrafts'));
    }

    public function create() {
        return view('auth.admin.aircrafts.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'program' => 'required|string',
        'aircraft_type' => 'required|string',
        'registration' => 'required|string',
        'customer' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'engineering_orders' => 'nullable|string',
    ]);

    // Simpan data Aircraft
    $aircraft = Aircraftprogram::create($request->only(['program', 'aircraft_type', 'registration', 'customer']));

    // Simpan image jika ada
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('aircrafts', 'public');
        $aircraft->image = $path;
        $aircraft->save();
    }

    // Simpan Engineering Orders
    if ($request->engineering_orders) {
        $engineeringOrders = json_decode($request->engineering_orders, true);
        foreach ($engineeringOrders as $order) {
            EngineeringOrder::create([
                'aircraft_id' => $aircraft->id,
                'order_no' => $order['order_no'],
                'subject_title' => $order['subject_title'],
                'start_date' => $order['start_date'],
            ]);
        }
    }

    return redirect()->route('admin.aircrafts.index')->with('success', 'Data Aircraft berhasil ditambahkan!');
}

    

    public function edit($id) {
        $aircraft = AircraftProgram::findOrFail($id);
        return view('auth.admin.aircrafts.edit', compact('aircraft'));
    }

    public function update(Request $request, $id) {
        $aircraft = AircraftProgram::findOrFail($id);
        $data = $request->validate([
            'program' => 'required',
            'tipe_pesawat' => 'required',
            'registrasi' => 'required',
            'customer' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('aircrafts', 'public');
        }

        $aircraft->update($data);
        return redirect()->route('admin.aircrafts.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id) {
        $aircraft = AircraftProgram::findOrFail($id);
        $aircraft->delete();
        return redirect()->route('admin.aircrafts.index')->with('success', 'Data berhasil dihapus!');
    }
}
