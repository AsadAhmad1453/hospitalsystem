<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ultrasound;
class UltrasoundController extends Controller
{
    public function index()
    {
        $uss = Ultrasound::all();
        return view('admin.ultrasound.ultrasound', compact('uss'));
    }

    public function saveUltrasound(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ultrasound::create([
            'name' => $request->name,
        ]);

        return redirect()->route('uss')->with('success', 'Ultrasound created successfully.');
    }

    public function deleteUltrasound($id)
    {
        $ultrasound = Ultrasound::findOrFail($id);
        $ultrasound->delete();

        return redirect()->route('uss')->with('success', 'Ultrasound deleted successfully.');
    }

    // New admin panel methods
    public function indexNew()
    {
        $uss = Ultrasound::all();
        return view('admin-new.laboratory.ultrasounds', compact('uss'));
    }

    public function saveUltrasoundNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ultrasound::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Ultrasound created successfully.');
    }

    public function deleteUltrasoundNew($id)
    {
        $ultrasound = Ultrasound::findOrFail($id);
        $ultrasound->delete();

        return redirect()->back()->with('success', 'Ultrasound deleted successfully.');
    }
}
