<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = ['nombre', 'slug'];
    public static function rules()
    {
        return [
            'nombre' => 'required|unique:categorias',
            'slug' => 'required|unique:categorias',
        ];
    }
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_categoria');
    }
}