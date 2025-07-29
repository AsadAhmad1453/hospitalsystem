<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('admin.banks.banks', compact('banks'));
    }

    public function saveBank(Request $request)
    {
        // Validate the request
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'bank_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB max
        ]);

        try {
            $bank = new Bank();
            $bank->bank_name = $request->bank_name;
            
            // Handle file upload if present
            if ($request->hasFile('bank_logo') && $request->file('bank_logo')->isValid()) {
                $file = $request->file('bank_logo');
                
                // Generate unique filename
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                
                // Store file in storage/app/public/bank-logos directory
                $path = $file->storeAs('bank-logos', $filename, 'public');
                
                // Save the file path to database
                $bank->bank_logo = $path;
            }
            
            $bank->save();
            
            return redirect()->back()->with('success', 'Bank saved successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving bank: ' . $e->getMessage());
        }
    }

    public function deleteBank($id)
    {
        try {
            $bank = Bank::findOrFail($id);
            
            // Delete the logo file if it exists
            if ($bank->bank_logo && Storage::disk('public')->exists($bank->bank_logo)) {
                Storage::disk('public')->delete($bank->bank_logo);
            }
            
            $bank->delete();
            return redirect()->back()->with('success', 'Bank deleted successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting bank: ' . $e->getMessage());
        }
    }
}
