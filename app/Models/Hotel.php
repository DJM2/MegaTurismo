<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hoteles';

    protected $fillable = ['nombre', 'ubicacion', 'descripcion', 'img'];

    public function tours()
    {
        return $this->belongsToMany(Tours::class);
    }
}
