<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;
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
