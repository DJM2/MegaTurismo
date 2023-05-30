<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tours extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'contenido',
        'resumen',
        'detallado',
        'incluidos',
        'importante',
        'lugarInicio',
        'lugarFin',
        'precioReal',
        'precioPublicado',
        'dias',
        'imgThumb',
        'img',
        'mapa',
        'categoria',
        'keywords',
        'slug',
        'galeria',
    ];

    public static function rules()
    {
        return [
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
        ];
    }

 
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'tour_categoria');
    }
}