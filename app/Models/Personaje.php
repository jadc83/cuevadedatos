<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $fillable = ['user_id' ,
                           'nombre' ,
                           'profesion',
                           'nacionalidad' ,
                           'cordura_maxima',
                           'cor',
                           'fue',
                           'con',
                           'des',
                           'tam',
                           'apa',
                           'edu',
                           'int',
                           'efectivo',
                            'pod',
                            'ahorros',
                            'ingresos'];
    //
}
