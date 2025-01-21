<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    protected $fillable = ['denominacion', 'descripcion', 'valor'];

    public function habilidades()
    {
        return $this->hasMany(Habilidad::class);
    }
}
