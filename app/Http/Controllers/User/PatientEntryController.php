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
use App\Models\WebReq;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;

class PatientEntryController extends Controller
{
    public function index()
    {
        $patients = Patient::where('patient_status', '1')->get();
        return view('user.patient-entry.patient-entry', compact('patients'));
    }

    public function addPatient()
    {
        $doctors = User::role('doctor')->get();
        $nurses = User::role('nurse')->get();
        $dcs = User::role('data collector')->get();
        $services = Service::all();
        return view('user.patient-entry.add-patient', get_defined_vars());
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
        $validatedData = collect($request->validated())->except('services')->toArray();
        $patient = Patient::create($validatedData);
        foreach ($request->services as $service) {
            Invoice::create([
                'patient_id' => $patient->id,
                'service_id' => $service,
            ]);
        }
        return redirect()->route('patient-invoice', $patient->id)->with('success', 'Patient added successfully.');
    }

    public function updatePatient(Request $request, $patient_id)
    {
        $request->validate([
            'services' => 'required|array|min:1',
            'user_id' => 'required|exists:users,id',
        ]);
        foreach ($request->services as $service) {
            Invoice::create([
                'patient_id' => $patient_id,
                'service_id' => $service,
            ]);
        }

        return redirect()->route('patient-invoice', $patient_id)->with('success', 'Patient added successfully.');
    }

    public function invoice($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $invoices = Invoice::where('patient_id', $patientId)->with('service')->get();
        $services = Service::all();
        $banks = Bank::all();

        $totalAmount = $invoices->sum(function($invoice) {
            return ($invoice->service ) ? (float)$invoice->service->amount : 0;
        });
        return view('user.patient-entry.invoice', get_defined_vars());
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
            'nursing_status' => '0',
            'doctor_status' => '0',
            'token' => $token,
            'cost' => $request->cost
        ]);
        Invoice::where('patient_id', $id)->delete();
        return redirect()->route('patient-entry')->with(['success' => 'Payment Made Successfully']);
    }

    public function roundStatus($id)
    {
        $round = Round::where('patient_id', $id)->first();
        if($round){
            $round->round_status = '0';
            $round->save();
        }
        $patient = Patient::findOrFail($id);
        $patient->patient_status = '0';
        $patient->save();
        return redirect()->route('patient-entry')->with('success', 'Round status updated successfully.');
    }


    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $doctors = User::role('Doctor')->get();
        $nurses = User::role('Nurse')->get();
        $dcs = User::role('Data Collector')->get();
        $services = Service::all();
        return view('user.patient-entry.update-patient', get_defined_vars());
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

    public function pastpatients()
    {
        $patients = Patient::where('patient_status', '0')->get();
        return view('user.patient-entry.past-patients', get_defined_vars());
    }

    public function saveWebReq(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'services' => 'required|string|max:255',
        ]);

        $webReq = new WebReq();
        $webReq->name = $validated['name'];
        $webReq->phone = $validated['phone'];
        $webReq->date = $validated['date'];
        $webReq->services = $validated['services'];
        $webReq->save();

        return back();
    }

    public function webreqs(){
        $webreqs = WebReq::all();
        return view('user.patient-entry.web-reqs', get_defined_vars());
    }
}
