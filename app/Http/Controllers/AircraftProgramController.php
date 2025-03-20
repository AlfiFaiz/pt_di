<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;
use App\Models\EngineeringOrder;
    

class AircraftProgramController extends Controller {
    public function index() {
        $aircraftPrograms = AircraftProgram::all();
        return view('auth.customer.project', compact('aircraftPrograms'));
    }

    
    public function show($id) {
        $aircraftProgram = AircraftProgram::findOrFail($id);
    
        // Ambil semua Engineering Orders terkait
        $orders = EngineeringOrder::where('aircraft_id', $id)->get();
    
        // Hitung total dan selesai
        $totalOrders = $orders->count();
        $completedOrders = $orders->whereNotNull('finish_date')->whereNotNull('insp_stamp')->count();
    
        // Hitung persentase progres
        $progressPercentage = $totalOrders > 0 ? round(($completedOrders / $totalOrders) * 100, 2) : 0;
    
        return view('auth.customer.project_detail', compact('aircraftProgram', 'orders', 'progressPercentage'));
    }
    
}
