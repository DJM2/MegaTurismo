<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Tours;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    public function packages()
    {
        $tours = Tours::all();
        $destinos = Destino::all();
        return view('peru-packages', compact('tours', 'destinos'));
    }
    public function adventures()
    {
        $tours = Tours::all();
        $destinos = Destino::all();
        return view('peru-adventures', compact('tours', 'destinos'));
    }
    public function gastronomy()
    {
        $tours = Tours::all();
        $destinos = Destino::all();
        return view('gastronomy', compact('tours', 'destinos'));
    }
    public function spiritual()
    {
        $tours = Tours::all();
        $destinos = Destino::all();
        return view('spiritual', compact('tours', 'destinos'));
    }
    public function blogen()
    {
        $tours = Tours::all();
        $destinos = Destino::all();
        return view('blog.index', compact('tours', 'destinos'));
    }
    public function destinies(){
        $destinos = Destino::all();
        return view('destinies', compact('destinos'));
    }
}