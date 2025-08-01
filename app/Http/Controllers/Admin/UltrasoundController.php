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
}
