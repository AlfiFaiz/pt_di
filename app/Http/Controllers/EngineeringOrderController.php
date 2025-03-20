<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AircraftProgram;
use App\Models\EngineeringOrder;
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
    public function store(Request $request) {
        $request->validate([
            'engineering_order_no' => 'required|string|max:255',
            'subject_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'type_order' => 'required|string',
            'aircraft_id' => 'required|exists:aircraft_programs,id',
        ]);
    
        $order = EngineeringOrder::create([
            'engineering_order_no' => $request->engineering_order_no,
            'subject_title' => $request->subject_title,
            'start_date' => $request->start_date,
            'type_order' => $request->type_order,
            'aircraft_id' => $request->aircraft_id,
        ]);
    
        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }
    
      // Update Engineering Order
      public function update(Request $request, $id)
      {
          $order = EngineeringOrder::findOrFail($id);
          $order->update([$request->field => $request->value]);
  
          return response()->json(['message' => 'Data berhasil diperbarui!']);
      }
  
      // Hapus Engineering Order
      public function destroy($id)
      {
          $order = EngineeringOrder::findOrFail($id);
          $order->delete();
  
          return response()->json(['message' => 'Data berhasil dihapus!']);
      }
}
