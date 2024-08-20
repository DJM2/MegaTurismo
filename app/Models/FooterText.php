<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterText extends Model
{
    protected $table = 'foo_text';
    protected $fillable = ['text'];
}
