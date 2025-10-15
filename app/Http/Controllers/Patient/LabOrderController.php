<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabOrderController extends Controller
{
    public function index()
    {
        return view('patient.lab-orders.lab-orders');
    }
}
