<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EngineeringOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class EngineeringOrderController extends Controller
{
    public function downloadPDF($id)
    {
        $orders = EngineeringOrder::where('aircraft_id', $id)->get();
        $aircraft = $orders->first()->aircraft ?? null; // Ambil informasi pesawat

        $pdf = Pdf::loadView('pdf.engineering_orders', compact('orders', 'aircraft'));
        return $pdf->download('engineering_orders.pdf');
    }
}
