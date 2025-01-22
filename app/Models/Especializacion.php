<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especializacion extends Model
{
    protected $table = 'especializaciones';
    protected $fillable = ['nombre', 'familia_id'];
    use HasFactory;

    public function personajes()
    {
        return $this->belongsToMany(Personaje::class)
                    ->withPivot('puntuacion');
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }
}
