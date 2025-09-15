<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xray;

class XrayController extends Controller
{
    public function index()
    {
        $xrays = Xray::all();
        return view('admin.xrays.xrays', compact('xrays'));
    }

    public function saveXray(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $xray = new Xray();
        $xray->name = $request->name;
        $xray->save();

        return redirect()->back()->with('success', 'X-ray added successfully.');
    }

    public function deleteXray($id)
    {
        $xray = Xray::findOrFail($id);
        $xray->delete();

        return redirect()->back()->with('success', 'X-ray deleted successfully.');
    }

    // New admin panel methods
    public function indexNew()
    {
        $xrays = Xray::all();
        return view('admin-new.laboratory.xrays', compact('xrays'));
    }

    public function saveXrayNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $xray = new Xray();
        $xray->name = $request->name;
        $xray->save();

        return redirect()->back()->with('success', 'X-ray added successfully.');
    }

    public function deleteXrayNew($id)
    {
        $xray = Xray::findOrFail($id);
        $xray->delete();

        return redirect()->back()->with('success', 'X-ray deleted successfully.');
    }
}
