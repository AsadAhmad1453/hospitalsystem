<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElearningController extends Controller
{
    public function index()
    {
        return view('patient.elearning.elearning');
    }
}
