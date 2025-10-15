<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BioEntryController extends Controller
{
    public function index()
    {
        return view('patient.bio-entry.bio-entry');
    }
}
