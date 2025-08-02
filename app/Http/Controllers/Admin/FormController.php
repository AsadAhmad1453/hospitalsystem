<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('admin.forms.forms', compact('forms'));
    }

    public function saveForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->has('form_id') && $request->form_id) {
            // Update existing form
            $form = Form::findOrFail($request->form_id);
            $form->update([
                'name' => $request->name,
            ]);
            $message = 'Form updated successfully.';
        } else {
            // Create new form
            Form::create([
                'name' => $request->name,
            ]);
            $message = 'Form created successfully.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function deleteForm($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->back()->with('success', 'Form deleted successfully.');
    }
}
