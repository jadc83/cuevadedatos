<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoArma extends Model
{
    /** @use HasFactory<\Database\Factories\TipoArmaFactory> */
    protected $fillable = ['nombre'];

    use HasFactory;
    public function armas(): HasMany
    {
        return $this->hasMany(Arma::class);
    }
}
