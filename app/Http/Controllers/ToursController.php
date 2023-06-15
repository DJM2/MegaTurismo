<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tours::all();
        return view('admin.tours.tours.index', compact('tours'));
    }
    public function mostrar()
    {
        $tours = Tours::all();
        $gruposTours = $tours->chunk(4);
        return view('welcome', compact('gruposTours'));
    }

    public function create()
    {
        $categorias = Categorias::query()->pluck('nombre', 'id');
        return view('admin.tours.tours.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:tours',
            'descripcion' => 'required',
            'contenido' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'importante' => 'nullable',
            'lugarInicio' => 'nullable',
            'lugarFin' => 'nullable',
            'precioReal' => 'required|integer',
            'precioPublicado' => 'required|integer',
            'dias' => 'required|integer',
            'imgThumb' => 'required',
            'img' => 'required',
            'mapa' => 'nullable',
            'categoria' => 'required',
            'keywords' => 'required',
            'slug' => 'required|unique:tours',
            'galeria' => 'required',
        ]);

        $tour = new Tours();
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->contenido = $validated['contenido'];
        $tour->resumen = $validated['resumen'];
        $tour->importante = $validated['importante'];
        $tour->lugarInicio = $validated['lugarInicio'];
        $tour->lugarFin = $validated['lugarFin'];
        $tour->detallado = $validated['detallado'];
        $tour->incluidos = $validated['incluidos'];
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->categoria = $validated['categoria'];
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        $imgThumbName = $validated['imgThumb']->getClientOriginalName();
        $validated['imgThumb']->move('img/thumb/', $imgThumbName);
        $tour->imgThumb = 'img/thumb/' . $imgThumbName;

        $imgName = $validated['img']->getClientOriginalName();
        $validated['img']->move('img/galeria/', $imgName);
        $tour->img = 'img/galeria/' . $imgName;

        if ($request->has('mapa')) {
            $mapaName = $validated['mapa']->getClientOriginalName();
            $validated['mapa']->move('img/mapas/', $mapaName);
            $tour->mapa = 'img/mapas/' . $mapaName;
        }

        if ($request->has('galeria')) {
            $galeriaFiles = $request->file('galeria');
            $galeriaNames = [];

            foreach ($galeriaFiles as $galeriaFile) {
                $galeriaName = $galeriaFile->getClientOriginalName();
                $galeriaFile->move('img/galeriaTours', $galeriaName);
                $galeriaNames[] = url('img/galeriaTours/' . $galeriaName);
            }

            $tour->galeria = implode(',', $galeriaNames);
        }

        $tour->save();

        return redirect()->route('tours.index');
    }

    public function show($slug)
    {
        $tour = Tours::where('slug', $slug)->firstOrFail();
        return view('admin.tours.tours.show', compact('tour'));
    }

    public function edit($id)
    {
        $tour = Tours::findOrFail($id);
        $categorias = Categorias::all();

        return view('admin.tours.tours.edit', compact('tour', 'categorias'));
    }
    /* public function edit($id)
    {
        $tour = Tours::findOrFail($id);
        return view('admin.tours.tours.edit', compact('tour'));
    } */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:tours,nombre,' . $id,
            'descripcion' => 'required',
            'contenido' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'importante' => 'nullable',
            'lugarInicio' => 'nullable',
            'lugarFin' => 'nullable',
            'precioReal' => 'required|integer',
            'precioPublicado' => 'required|integer',
            'dias' => 'required|integer',
            'imgThumb' => 'nullable',
            'img' => 'nullable',
            'mapa' => 'nullable',
            'categoria' => 'required',
            'keywords' => 'required',
            'slug' => 'required|unique:tours,slug,' . $id,
            'galeria' => 'nullable',
        ]);

        $tour = Tours::findOrFail($id);
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->contenido = $validated['contenido'];
        $tour->resumen = $validated['resumen'];
        $tour->importante = $validated['importante'];
        $tour->lugarInicio = $validated['lugarInicio'];
        $tour->lugarFin = $validated['lugarFin'];
        $tour->detallado = $validated['detallado'];
        $tour->incluidos = $validated['incluidos'];
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->categoria = $validated['categoria'];
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        if ($request->hasFile('imgThumb')) {
            $imgThumbName = $validated['imgThumb']->getClientOriginalName();
            $validated['imgThumb']->move('img/thumb/', $imgThumbName);
            $tour->imgThumb = 'img/thumb/' . $imgThumbName;
        }

        if ($request->hasFile('img')) {
            $imgName = $validated['img']->getClientOriginalName();
            $validated['img']->move('img/galeria/', $imgName);
            $tour->img = 'img/galeria/' . $imgName;
        }

        if ($request->hasFile('mapa')) {
            $mapaName = $validated['mapa']->getClientOriginalName();
            $validated['mapa']->move('img/mapas/', $mapaName);
            $tour->mapa = 'img/mapas/' . $mapaName;
        }

        if ($request->hasFile('galeria')) {
            $galeriaFiles = $request->file('galeria');
            $galeriaNames = [];

            foreach ($galeriaFiles as $galeriaFile) {
                $galeriaName = $galeriaFile->getClientOriginalName();
                $galeriaFile->move('img/galeriaTours', $galeriaName);
                $galeriaNames[] = url('img/galeriaTours/' . $galeriaName);
            }

            $tour->galeria = implode(',', $galeriaNames);
        }

        $tour->save();

        return redirect()->route('tours.index');
    }


    public function destroy(Tours $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'El tour ha sido eliminado correctamente.');
    }
}