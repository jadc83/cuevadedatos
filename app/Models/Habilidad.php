<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'habilidades';
    protected $fillable = ['nombre', 'descripcion', 'acierto_base'];
}
