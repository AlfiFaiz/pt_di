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
    public function store(Request $request) {
        $request->validate([
            'program' => 'required',
            'aircraft_type' => 'required',
            'registration' => 'required',
            'customer' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'engineering_orders.*.engineering_order_no' => 'required',
            'engineering_orders.*.subject_title' => 'required',
            'engineering_orders.*.start_date' => 'required|date',
        ]);
    
        // Simpan Aircraft Program
        $data = $request->except('engineering_orders');
    
        if ($request->hasFile('gambar')) {
            $data['image'] = $request->file('gambar')->store('aircrafts', 'public');
        }
    
        $aircraft = AircraftProgram::create($data);
    
        // Simpan Engineering Orders jika ada
        if ($request->has('engineering_orders')) {
            foreach ($request->engineering_orders as $order) {
                $aircraft->engineeringOrders()->create($order);
            }
        }
    
        return redirect()->route('admin.aircrafts.index')->with('success', 'Data berhasil ditambahkan!');
    }
    // public function store(Request $request) {
    //     dd($request->all()); // Debug: Lihat semua data yang dikirim
    // }
    
    
    

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
    public function show($id) {
        $aircraft = AircraftProgram::findOrFail($id);
        $orders = $aircraft->engineeringOrders; // Ambil semua Engineering Order terkait
    
        return view('auth/admin/aircrafts/detail', compact('aircraft', 'orders'));
    }
    public function updateAircraft(Request $request, $id)
{
    $aircraft = AircraftProgram::findOrFail($id);

    // Jika value kosong, simpan sebagai NULL
    $value = $request->value === "" ? null : $request->value;

    $aircraft->update([
        $request->field => $value
    ]);

    return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
}

    
}
