<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personaje extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'nombre',
        'profesion',
        'edad',
        'nacionalidad',
        'estudios',
        'fue',
        'con',
        'des',
        'tam',
        'apa',
        'int',
        'pod',
        'edu',
        'sue',
        'mp',
        'hp',
        'cor',
        'cor_actual',
        'ingresos',
        'ahorros',
        'efectivo',
        'antropologia',
        'arqueologia',
        'buscar_libros',
        'cerrajeria',
        'charlataneria',
        'ciencias_ocultas',
        'conducir_automovil',
        'conducir_maquinaria',
        'contabilidad',
        'credito',
        'derecho',
        'descubrir',
        'disfrazarse',
        'electricidad',
        'encanto',
        'equitación',
        'escuchar',
        'esquivar',
        'historia',
        'intimidar',
        'juego_de_manos',
        'lanzar',
        'mecanica',
        'medicina',
        'mitos_cthulhu',
        'nadar',
        'naturaleza',
        'orientarse',
        'persuasion',
        'primeros_auxilios',
        'psicoanalisis',
        'psicologia',
        'saltar',
        'seguir_rastros',
        'sigilo',
        'trepar',
        'vivo',
    ];


    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }
    //
}
