<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destinos';
    protected $fillable = ['nombre', 'descripcion', 'img', 'imgThumb', 'slug'];
}
