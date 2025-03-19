<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;

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
            'engineering_orders.*.finish_date' => 'nullable|date',
            'engineering_orders.*.type_order' => 'required|in:Basic Re-assy and Functional Test,Customizing Functional Test,Flight Line,Maintenance,SB, ASB, AND EASB',
            'engineering_orders.*.insp_stamp' => 'nullable|string', // ✅ Bisa NULL
        ]);
    
        $data = $request->except('engineering_orders');
    
        if ($request->hasFile('gambar')) {
            $data['image'] = $request->file('gambar')->store('aircrafts', 'public');
        } else {
            $data['image'] = null;
        }
    
        $aircraft = AircraftProgram::create($data);
    
        if ($request->has('engineering_orders')) {
            foreach ($request->engineering_orders as $order) {
                // ✅ Pastikan insp_stamp bisa NULL jika tidak diisi
                $order['insp_stamp'] = $order['insp_stamp'] ?? null;
                $aircraft->engineeringOrders()->create($order);
            }
        }
    
        return redirect()->route('admin.aircrafts.index')->with('success', 'Data berhasil ditambahkan!');
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
