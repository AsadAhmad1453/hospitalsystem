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
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'bank_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $bank = new Bank();
            $bank->bank_name = $request->bank_name;

            if ($request->hasFile('bank_logo') && $request->file('bank_logo')->isValid()) {
                $file = $request->file('bank_logo');

                // Generate unique filename
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

                // Define target path relative to public directory
                $destinationPath = public_path('bank-logos');

                // Ensure the directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to public/bank-logos
                $file->move($destinationPath, $filename);

                // Save path relative to public (for access via URL)
                $bank->bank_logo = 'bank-logos/' . $filename;
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

    // New admin panel methods
    public function indexNew()
    {
        $banks = Bank::all();
        return view('admin-new.financial.banks', compact('banks'));
    }

    public function saveBankNew(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'bank_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $bank = new Bank();
            $bank->bank_name = $request->bank_name;

            if ($request->hasFile('bank_logo') && $request->file('bank_logo')->isValid()) {
                $file = $request->file('bank_logo');

                // Generate unique filename
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

                // Define target path relative to public directory
                $destinationPath = public_path('bank-logos');

                // Ensure the directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to public/bank-logos
                $file->move($destinationPath, $filename);

                // Save path relative to public (for access via URL)
                $bank->bank_logo = 'bank-logos/' . $filename;
            }

            $bank->save();

            return redirect()->back()->with('success', 'Bank saved successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving bank: ' . $e->getMessage());
        }
    }

    public function deleteBankNew($id)
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
