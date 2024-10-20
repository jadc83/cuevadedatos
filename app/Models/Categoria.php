<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function hechizos()
    {
        return $this->hasMany(Hechizo::class);
    }
}
