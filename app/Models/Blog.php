<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'nombre',
        'imgThumb',
        'imgBig',
        'resumen',
        'descripcion',
        'slug',
        'keyword',
    ];
    public function tags()
    {
        return $this->belongsToMany(Entag::class, 'entags', 'blog_id', 'entag_id');
    }
}
