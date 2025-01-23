<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecializacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definimos las familias y sus especializaciones
        $familiasEspecializaciones = [
            'Armas de fuego' => [
                'base' => 25,
                'especializaciones' => [
                    ['nombre' => 'Arma corta'],
                    ['nombre' => 'Fusil/Escopeta'],
                    ['nombre' => 'Subfusil'],
                    ['nombre' => 'Ametralladora'],
                ],
            ],
            'Arte/Artesania' => [
                'base' => 5,
                'especializaciones' => [
                    ['nombre' => 'Pintar'],
                    ['nombre' => 'Cantar'],
                    ['nombre' => 'Fotografía'],
                ],
            ],
            'Ciencia' => [
                'base' => 1,
                'especializaciones' => [
                    ['nombre' => 'Química'],
                    ['nombre' => 'Física'],
                    ['nombre' => 'Ingenieria'],
                ],
            ],
            'Combatir' => [
                'base' => 25,
                'especializaciones' => [
                    ['nombre' => 'Pelea'],
                    ['nombre' => 'Espada'],
                ],
            ],
            'Lengua propia' => [
                'base' => 50,
                'especializaciones' => [
                    ['nombre' => 'Inglés'],
                    ['nombre' => 'Español'],
                    ['nombre' => 'Ruso'],
                    ['nombre' => 'Francés'],
                ],
            ],
            'Lengua extranjera' => [
                'base' => 1,
                'especializaciones' => [
                    ['nombre' => 'Inglés'],
                    ['nombre' => 'Español'],
                    ['nombre' => 'Ruso'],
                    ['nombre' => 'Francés'],
                ],
            ],
            'Pilotar' => [
                'base' => 1,
                'especializaciones' => [
                    ['nombre' => 'Pilotar avión'],
                    ['nombre' => 'Pilotar globo'],
                ],
            ],
            'Supervivencia' => [
                'base' => 10,
                'especializaciones' => [
                    ['nombre' => 'Supervivencia en montaña'],
                    ['nombre' => 'Supervivencia en bosques'],
                    ['nombre' => 'Supervivencia en desierto'],
                    ['nombre' => 'Supervivencia en tundra'],
                ],
            ],
        ];

        // Recorremos cada familia y sus especializaciones
        foreach ($familiasEspecializaciones as $familiaNombre => $familiaData) {
            $familia = DB::table('familias')->where('nombre', $familiaNombre)->first();
            if (!$familia) {
                $familiaId = DB::table('familias')->insertGetId([
                    'nombre' => $familiaNombre,
                    'base' => $familiaData['base'], // Usar base definido en el array
                ]);
            } else {
                $familiaId = $familia->id;
            }

            foreach ($familiaData['especializaciones'] as $especializacion) {
                DB::table('especializaciones')->insertGetId([
                    'nombre' => $especializacion['nombre'],
                    'familia_id' => $familiaId,
                ]);
            }
        }
    }
}
