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

    public function addService()
    {
        return view('admin.services.add-service');
    }

    public function saveService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'amount' => 'required|string',
            'description' => 'required|string',
            'detail_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = null;

            // Handle image upload to public/service-images
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('service-images');

                // Create directory if it doesn't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);

                // Save path as 'service-images/image_name'
                $imagePath = 'service-images/' . $imageName;
            }

            Service::create([
                'service_name' => $request->service_name,
                'description' => $request->description,
                'amount' => $request->amount,
                'detail_description' => $request->detail_description,
                'image' => $imagePath,
            ]);

            DB::commit();
            return redirect()->route('services')->with('success', 'Service saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit-services', compact('service'));
    }

    public function updateService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|string',
            'detail_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $service = Service::findOrFail($request->input('id'));
            $service->service_name = $request->input('service_name');
            $service->description = $request->input('description');
            $service->amount = $request->input('amount');
            $service->detail_description = $request->input('detail_description');

            // Handle image upload to public/service-images
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('service-images');

                // Create directory if it doesn't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);

                // Optionally, delete old image if exists
                if ($service->image && file_exists(public_path($service->image))) {
                    @unlink(public_path($service->image));
                }

                // Store the path as 'service-images/image_name'
                $service->image = 'service-images/' . $imageName;
            }

            $service->save();

            DB::commit();
            return redirect()->route('services')->with('success', 'Service updated successfully.');
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

    public function deleteAllServices()
    {
        try {
            Service::truncate();
            return redirect()->route('services')->with('success', 'All services deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('services')->with('error', 'Failed to delete all services. Please try again.');
        }
    }
}
