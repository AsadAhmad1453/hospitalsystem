<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dose;
class DoseController extends Controller
{


    // Display a listing of the doses
    public function index()
    {
        $dosage = Dose::all();
        return view('admin.dosage.dosage', compact('dosage'));
    }

    // Store a newly created dose in storage
    public function saveDose(Request $request)
    {
        $request->validate([
            'dose' => 'required|string|max:255',
        ]);

        $dose = new Dose();
        $dose->dose = $request->input('dose');
        $dose->save();

        return redirect()->back()->with('success', 'Dose added successfully.');
    }

    // Remove the specified dose from storage
    public function deleteDose($id)
    {
        $dose = Dose::findOrFail($id);
        $dose->delete();

        return redirect()->back()->with('success', 'Dose deleted successfully.');
    }
}
