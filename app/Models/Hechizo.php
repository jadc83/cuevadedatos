<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hechizo extends Model
{
    use HasFactory;

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'hechizo_libro', 'hechizo_id', 'libro_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
