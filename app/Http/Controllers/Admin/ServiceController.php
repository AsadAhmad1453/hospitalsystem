<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.services', get_defined_vars());
    }



    public function saveService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'amount' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            Service::create([
                'service_name' => $request->service_name,
                'amount' => $request->amount,
            ]);

            DB::commit();
            return redirect()->route('services')->with('success', 'Service saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services')->with('success', 'Service deleted successfully.');
    }
}
