<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    public function packages()
    {
        $tours = Tours::all();
        return view('peru-packages', compact('tours'));
    }
    public function adventures()
    {
        $tours = Tours::all();
        return view('peru-adventures', compact('tours'));
    }
    public function gastronomy()
    {
        $tours = Tours::all();
        return view('gastronomy', compact('tours'));
    }
    public function spiritual()
    {
        $tours = Tours::all();
        return view('spiritual', compact('tours'));
    }
}