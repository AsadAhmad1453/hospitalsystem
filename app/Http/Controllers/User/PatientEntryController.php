<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use App\Models\User;
use App\Models\Round;
use App\Models\Service;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class PatientEntryController extends Controller
{
    public function index()
    {
        $patients = Patient::where(function($query) {
                $query->where('payment_status', '0')
                     ->orWhereHas('round', function($q) {
                            $q->where('round_status', '1');
                        });
            })
            ->with('round')
            ->get();
        return view('user.patient-entry.patient-entry', compact('patients'));
    }
    public function addPatient()
    {
        $users = User::where('role_id','6')->get();
        $services = Service::all();
        return view('user.patient-entry.add-patient',compact('users', 'services'));
    }

    public function paydecline($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->payment_status = '0'; // Set payment status to unpaid
        $patient->save();
        return redirect()->route('patient-entry')->with('success', 'Payment status updated to unpaid.');
    }

    public function savepatient(StorePatientRequest $request)
    {
        $patientexists = Patient::where('unique_number', $request->unique_number)->first();
        $validatedData = collect($request->validated())->except('services')->toArray();
        if(!$patientexists){
            $patient = Patient::create($validatedData);
        }else {
            return back()->with('error', 'Patient already exists in record');
        }

        foreach ($request->services as $service) {
            Invoice::create([
                'patient_id' => $patient->id,
                'service_id' => $service,
            ]);
        }

        return redirect()->route('patient-invoice', $patient->id)->with('success', 'Patient added successfully.');
    }

    public function invoice($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $invoices = Invoice::where('patient_id', $patientId)->with('service')->get();
        $services = Service::all();


        $totalAmount = $invoices->sum(function($invoice) {
            return ($invoice->service ) ? (float)$invoice->service->amount : 0;
        });



        return view('user.patient-entry.invoice', compact('patient', 'invoices', 'services', 'totalAmount'));
    }

    public function payed(Request $request, $id){

        $patient = Patient::findOrFail($id);
        $patient->payment_status = '1';
        $patient->patient_status = '1';
        $patient->save();

        $token = Round::count() + 1;
        $round = Round::create([
            'patient_id' => $patient->id,
            'round_status' => '1',
            'visit_number' => 1,
            'token' => $token,
            'cost' => $request->cost
        ]);
        return redirect()->route('patient-entry')->with(['success' => 'Payment Made Successfully']);
    }

    public function roundStatus($id)
    {
        $round = Round::where('patient_id', $id)->firstOrFail();
        $round->round_status = '0';
        $round->save();

        $patient = Patient::findOrFail($id);
        $patient->patient_status = '0';
        $patient->save();
        return redirect()->route('patient-entry')->with('success', 'Round status updated successfully.');
    }

    public function patientStatusToggle(Request $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->patient_status = $request->status;
        $patient->save();
        if($patient->patient_status == '1') {
            Round::create([
                'patient_id' => $patient->id,
                'visit_number' => 1,
            ]);
        } else {
           $round = Round::where('patient_id', $patient->id)->first();
            if ($round) {
                $round->delete();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Patient status updated successfully.',
            'patient_status' => $patient->patient_status
        ]);
    }
    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $users = User::where('role_id','6')->get();
        return view('user.patient-entry.edit-patient', compact('patient', 'users'));
    }
    public function updatePatient(StorePatientRequest $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->Name = $request->name;
        $patient->Email = $request->email;
        $patient->Phone = $request->phone;
        $patient->Address = $request->address;
        $patient->DateOfBirth = $request->dateofbirth;
        $patient->user_id = $request->user_id;
        $patient->cnic = $request->cnic;
        $patient->unique_number = $request->unique_number;
        $patient->patient_status = $request->patient_status;
        $patient->save();

        return redirect()->route('patient-entry')->with('success', 'Patient updated successfully.');
    }
    public function viewPatient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('user.patient-entry.view-patient', compact('patient'));
    }
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patient-entry')->with('success', 'Patient deleted successfully.');
    }

    public function delAllRounds()
    {
        Patient::where('patient_status', '1')->update(['patient_status' => '0']);
        Round::truncate();
        return redirect()->route('user-dashboard')->with('success', 'All rounds deleted successfully.');
    }
}
