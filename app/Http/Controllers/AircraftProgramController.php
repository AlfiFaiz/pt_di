<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;

class AircraftProgramController extends Controller {
    public function index() {
        $aircraftPrograms = AircraftProgram::all();
        return view('auth.customer.project', compact('aircraftPrograms'));
    }

    public function show($id) {
        $aircraftProgram = AircraftProgram::findOrFail($id);
        return view('auth.customer.project_detail', compact('aircraftProgram'));
    }
}
