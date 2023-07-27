<?php

namespace App\Http\Controllers;

use App\Models\MenuEn;
use Illuminate\Http\Request;

class MenuEnController extends Controller
{
    public function index()
    {
        $textos = MenuEn::all();
        return view('admin.menuen.index', compact('textos'));
    }
    public function create()
    {
        return view('admin.menuen.create');
    }
}