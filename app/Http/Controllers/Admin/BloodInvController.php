<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodInv;

class BloodInvController extends Controller
{


    public function index()
    {
        $bloodInvestigations = BloodInv::all();
        return view('admin.blood-investigation.blood-investigation', get_defined_vars());
    }

    public function saveBloodInv(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $bloodInv = new BloodInv();
        $bloodInv->name = $request->name;
        $bloodInv->save();

        return redirect()->back()->with('success', 'Blood Investigation added successfully.');
    }

    public function deleteBloodInv($id)
    {
        $bloodInv = BloodInv::findOrFail($id);
        $bloodInv->delete();

        return redirect()->back()->with('success', 'Blood Investigation deleted successfully.');
    }
}
