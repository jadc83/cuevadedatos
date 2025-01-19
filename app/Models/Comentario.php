<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    protected $fillable = ['personaje_id', 'contenido'];
    public function comentable(){
        return $this->morphTo();
    }

    public function personaje()
{
    return $this->belongsTo(Personaje::class);
}

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;
}
