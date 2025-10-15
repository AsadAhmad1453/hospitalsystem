<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedRepsController extends Controller
{
    public function index()
    {
        return view('patient.medreps.medreps');
    }
}
