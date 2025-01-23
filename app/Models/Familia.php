<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    /** @use HasFactory<\Database\Factories\FamiliaFactory> */
    use HasFactory;
    protected $fillable = ['nombre', 'base'];

    public function especializaciones()
    {
        return $this->hasMany(Especializacion::class);
    }
}
