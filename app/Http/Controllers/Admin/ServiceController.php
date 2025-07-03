<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

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

        Service::Create([
            'service_name' => $request->service_name,
            'amount' => $request->amount,
        ]);

        return redirect()->route('services')->with('success', 'Service saved successfully.');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services')->with('success', 'Service deleted successfully.');
    }
}
