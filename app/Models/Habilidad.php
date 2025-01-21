<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'habilidades';
    protected $fillable = ['nombre', 'descripcion', 'objeto_id'];

    public function objeto()
    {
        return $this->belongsTo(Objeto::class);
    }
}
