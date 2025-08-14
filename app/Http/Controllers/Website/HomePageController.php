<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('website.home.home');
    }

    public function about()
    {
        return view('website.about.about');
    }
}
