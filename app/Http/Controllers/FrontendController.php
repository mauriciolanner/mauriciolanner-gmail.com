<?php

namespace App\Http\Controllers;

use App\Airport;

class FrontendController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function home()
    {
        $airports = Airport::orderBy('city', 'asc')->get();
        return view('frontend.pages.home', compact('airports'));
    }
}
