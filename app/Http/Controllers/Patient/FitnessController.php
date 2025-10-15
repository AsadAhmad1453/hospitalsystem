<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FitnessController extends Controller
{
    public function index()
    {
        return view('patient.fitness.fitness');
    }
}
