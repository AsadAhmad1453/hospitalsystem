<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ctscan;
class CtscanController extends Controller
{
    public function index()
    {
        $ctscans = Ctscan::all();
        return view('admin.ct-scan.ctscan', compact('ctscans'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ctscan::create([
            'name' => $request->name,
        ]);

        return redirect()->route('ctscans')->with('success', 'CT Scan created successfully.');
    }

    public function delete($id)
    {
        $ctscan = Ctscan::findOrFail($id);
        $ctscan->delete();

        return redirect()->route('ctscans')->with('success', 'CT Scan deleted successfully.');
    }

    // New admin panel methods
    public function indexNew()
    {
        $ctscans = Ctscan::all();
        return view('admin-new.laboratory.ctscans', compact('ctscans'));
    }

    public function saveNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ctscan::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'CT Scan created successfully.');
    }

    public function deleteNew($id)
    {
        $ctscan = Ctscan::findOrFail($id);
        $ctscan->delete();

        return redirect()->back()->with('success', 'CT Scan deleted successfully.');
    }
}
