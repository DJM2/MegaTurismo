<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Fecha;
use App\Models\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tours::with('categorias')->get();
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'precioReal' => 'required',
            'precioPublicado' => 'required',
            'dias' => 'required',
            'dificultad' => 'required',
            'imgThumb' => 'required|image',
            'img' => 'required|image',
            'galeria' => 'nullable|array',
            'galeria.*' => 'image',
            'contenido' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'keywords' => 'required',
            'slug' => 'required|unique:tours',

            'fechas' => 'nullable|array',
            'fechas.*.fecha' => 'required|date',
            'fechas.*.precio' => 'required|numeric',
        ]);

        $tour = new Tours();
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->dificultad = $validated['dificultad'];
        $tour->lugarInicio = $request->input('lugarInicio');
        $tour->lugarFin = $request->input('lugarFin');
        $tour->contenido = $request->input('contenido');
        $tour->resumen = $request->input('resumen');
        $tour->detallado = $request->input('detallado');
        $tour->incluidos = $request->input('incluidos');
        $tour->importante = $request->input('importante');
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        $imgThumbName = $validated['imgThumb']->getClientOriginalName();
        $validated['imgThumb']->move('img/thumb/', $imgThumbName);
        $tour->imgThumb = 'img/thumb/' . $imgThumbName;

        $imgName = $validated['img']->getClientOriginalName();
        $validated['img']->move('img/galeria/', $imgName);
        $tour->img = 'img/galeria/' . $imgName;

        if ($request->has('mapa')) {
            $mapa = $request->file('mapa');
            $mapaName = $mapa->getClientOriginalName();
            $mapa->move('img/mapas/', $mapaName);
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

        $tour->categorias()->attach($request->input('categoria_id'));
        if ($request->has('fechas')) {
            $fechas = $request->input('fechas');
            foreach ($fechas as $fecha) {
                $fechaModel = new Fecha();
                $fechaModel->fecha = $fecha['fecha'];
                $fechaModel->precio = $fecha['precio'];
                $fechaModel->tour_id = $tour->id;
                $fechaModel->save();
            }
        }

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
        $categorias = Categorias::query()->pluck('nombre', 'id');
        return view('admin.tours.tours.edit', compact('tour', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precioReal' => 'required',
            'precioPublicado' => 'required',
            'dias' => 'required',
            'dificultad' => 'required',
            'imgThumb' => 'image',
            'img' => 'image',
            'galeria' => 'nullable|array',
            'galeria.*' => 'image',
            'contenido' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'keywords' => 'required',
            'slug' => 'required|unique:tours,slug,' . $id,
        ]);

        $tour = Tours::findOrFail($id);
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->dificultad = $validated['dificultad'];
        $tour->lugarInicio = $request->input('lugarInicio');
        $tour->lugarFin = $request->input('lugarFin');
        $tour->contenido = $request->input('contenido');
        $tour->resumen = $request->input('resumen');
        $tour->detallado = $request->input('detallado');
        $tour->incluidos = $request->input('incluidos');
        $tour->importante = $request->input('importante');
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        if ($request->has('imgThumb')) {
            $imgThumbName = $validated['imgThumb']->getClientOriginalName();
            $validated['imgThumb']->move('img/thumb/', $imgThumbName);
            $tour->imgThumb = 'img/thumb/' . $imgThumbName;
        }

        if ($request->has('img')) {
            $imgName = $validated['img']->getClientOriginalName();
            $validated['img']->move('img/galeria/', $imgName);
            $tour->img = 'img/galeria/' . $imgName;
        }

        if ($request->has('mapa')) {
            $mapa = $request->file('mapa');
            $mapaName = $mapa->getClientOriginalName();
            $mapa->move('img/mapas/', $mapaName);
            $tour->mapa = 'img/mapas/' . $mapaName;
        }

        if ($request->has('galeria')) {
            $galeriaFiles = $request->file('galeria');
            $galeriaNames = [];

            foreach ($galeriaFiles as $galeriaFile) {
                $galeriaName = $galeriaFile->getClientOriginalName();
                $galeriaFile->move('img/galeriaTours', $galeriaName);
                $galeriaNames[] = 'img/galeriaTours/' . $galeriaName;
            }

            $tour->galeria = implode(',', $galeriaNames);
        }

        $tour->save();
        $tour->categorias()->sync($request->input('categoria_id'));

        return redirect()->route('tours.index');
    }

    /* public function update(Request $request, $id)
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
            'dificulidad' => 'required',
            'imgThumb' => 'nullable',
            'img' => 'nullable',
            'mapa' => 'nullable',
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
        $tour->dificulidad = $validated['dificulidad'];
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
    } */


    public function destroy(Tours $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'El tour ha sido eliminado correctamente.');
    }
}