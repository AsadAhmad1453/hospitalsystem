<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
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
}
