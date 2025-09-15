<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;
class MedicController extends Controller
{


    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.medicines.medicines', compact('medicines'));
    }

    public function saveMedic(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $medicine = new Medicine();
        $medicine->name = $request->input('name');
        $medicine->save();

        return redirect()->back()->with('success', 'Medicine added successfully.');
    }

    public function deleteMedic($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->back()->with('success', 'Medicine deleted successfully.');
    }

    // New admin panel methods
    public function indexNew()
    {
        $medicines = Medicine::all();
        $lowStockCount = Medicine::where('stock_quantity', '<=', 10)->count();
        $prescriptionsCount = 0; // You can implement this based on your prescription system
        $totalValue = Medicine::sum(DB::raw('price * stock_quantity'));
        return view('admin-new.pharmacy.medicines', get_defined_vars());
    }

    public function saveMedicNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'generic_name' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'min_stock_level' => 'nullable|integer|min:0',
            'expiry_date' => 'nullable|date',
            'batch_number' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'side_effects' => 'nullable|string',
            'dosage_instructions' => 'nullable|string',
        ]);

        try {
            $medicine = new Medicine();
            $medicine->name = $request->input('name');
            $medicine->generic_name = $request->input('generic_name');
            $medicine->manufacturer = $request->input('manufacturer');
            $medicine->category = $request->input('category');
            $medicine->price = $request->input('price');
            $medicine->stock_quantity = $request->input('stock_quantity');
            $medicine->unit = $request->input('unit');
            $medicine->min_stock_level = $request->input('min_stock_level', 10);
            $medicine->expiry_date = $request->input('expiry_date');
            $medicine->batch_number = $request->input('batch_number');
            $medicine->description = $request->input('description');
            $medicine->side_effects = $request->input('side_effects');
            $medicine->dosage_instructions = $request->input('dosage_instructions');
            $medicine->save();

            return response()->json(['success' => true, 'message' => 'Medicine added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error adding medicine.']);
        }
    }

    public function deleteMedicNew($id)
    {
        try {
            $medicine = Medicine::findOrFail($id);
            $medicine->delete();
            return response()->json(['success' => true, 'message' => 'Medicine deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting medicine.']);
        }
    }

    public function addMedicineNew()
    {
        return view('admin-new.pharmacy.add-medicine');
    }
}
