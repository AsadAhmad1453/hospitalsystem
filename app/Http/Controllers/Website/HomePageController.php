<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Query;

class HomePageController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('website.home.home', get_defined_vars());
    }

    public function about()
    {
        return view('website.about.about');
    }
    public function contact()
    {
        return view('website.contact.contact');
    }

    public function services()
    {
        return view('website.services.services');
    }

    public function serviceDetail($id)
    {
        $services = Service::all();
        $service = Service::where('id', $id)->first();
        return view('website.services.services-details', get_defined_vars());
    }

    public function querySubmit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Save the query to the database
        Query::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your query has been submitted successfully!');
    }
}
