<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Arma extends Model
{

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'dano',
        'alcance',
        'usos',
        'cargador',
        'valorLegal',
        'valorIlegal',
        'fd',
        'epoca',
        'tipo_arma_id',
        'especializacion_id',
    ];


    public function tipoArma(): BelongsTo
    {
        return $this->belongsTo(TipoArma::class);
    }

    public function personajes(): BelongsToMany
    {
        return $this->belongsToMany(Personaje::class);
    }

    /** @use HasFactory<\Database\Factories\ArmaFactory> */
    use HasFactory;
}
