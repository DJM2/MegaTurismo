<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $blogsHead = Blog::take(4)->get();
        $blogsIdsToSkip = Blog::latest()->take(2)->pluck('id');
        $blogs = Blog::with('tags')->latest()->take(2)->get();
        $blogsCards = Blog::with('tags')->whereNotIn('id', $blogsIdsToSkip)->latest()->get();
        return view('blog.index', compact('tours', 'destinos', 'blogs', 'blogsCards', 'blogsHead'));
    }
    public function destinies()
    {
        $destinos = Destino::all();
        return view('destinies', compact('destinos'));
    }
}