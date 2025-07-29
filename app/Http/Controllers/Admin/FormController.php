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

        Form::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Form created successfully.');
    }

    public function deleteForm($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->back()->with('success', 'Form deleted successfully.');
    }
}
