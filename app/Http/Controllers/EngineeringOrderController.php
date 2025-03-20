<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;
use Barryvdh\DomPDF\Facade\Pdf;

class EngineeringOrderController extends Controller
{
    public function downloadPDF($id)
    {
        // Ambil data Aircraft dan Engineering Orders terkait
        $aircraft = AircraftProgram::with('engineeringOrders')->find($id);

        if (!$aircraft) {
            abort(404, 'Aircraft Program tidak ditemukan.');
        }

        // Data Engineering Orders terkait
        $orders = $aircraft->engineeringOrders;

        // Generate PDF
        $pdf = Pdf::loadView('pdf.engineering_orders', compact('aircraft', 'orders'));

        return $pdf->download('engineering_orders.pdf');
    }
}
