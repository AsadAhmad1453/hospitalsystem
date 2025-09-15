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

    // New admin panel methods
    public function indexNew()
    {
        $bloodTests = BloodInv::with('patient', 'doctor')->get();
        $completedTests = BloodInv::where('status', 'completed')->count();
        $pendingTests = BloodInv::where('status', 'pending')->count();
        $abnormalResults = BloodInv::where('is_abnormal', true)->count();
        return view('admin-new.laboratory.blood-investigation', get_defined_vars());
    }

    public function saveBloodInvNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'test_name' => 'required|string|max:255',
            'test_type' => 'required|string|max:255',
            'test_code' => 'nullable|string|max:255',
            'priority' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'expected_date' => 'nullable|date',
            'cost' => 'nullable|numeric|min:0',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
        ]);

        try {
            $bloodInv = new BloodInv();
            $bloodInv->name = $request->name;
            $bloodInv->test_name = $request->test_name;
            $bloodInv->test_type = $request->test_type;
            $bloodInv->test_code = $request->test_code;
            $bloodInv->priority = $request->priority;
            $bloodInv->description = $request->description;
            $bloodInv->expected_date = $request->expected_date;
            $bloodInv->cost = $request->cost;
            $bloodInv->patient_id = $request->patient_id;
            $bloodInv->doctor_id = $request->doctor_id;
            $bloodInv->status = 'pending';
            $bloodInv->save();

            return response()->json(['success' => true, 'message' => 'Blood Investigation added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error adding blood investigation.']);
        }
    }

    public function deleteBloodInvNew($id)
    {
        try {
            $bloodInv = BloodInv::findOrFail($id);
            $bloodInv->delete();
            return response()->json(['success' => true, 'message' => 'Blood Investigation deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting blood investigation.']);
        }
    }

    public function addBloodTestNew()
    {
        return view('admin-new.laboratory.add-blood-test');
    }
}
