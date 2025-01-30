<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;
    protected $fillable = ['denominacion', 'descripcion', 'valor', 'stock'];

    public function habilidades()
    {
        return $this->hasMany(Habilidad::class);
    }

    public function personajes()
    {
        return $this->belongsToMany(Personaje::class, 'objeto_personaje', 'personaje_id', 'objeto_id')->withPivot('cantidad');
    }
}
