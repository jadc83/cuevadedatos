<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libros>
 */
class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->randomElement([
                'Susurros en la Oscuridad',
                'Sombras del Abismo',
                'El Grimorio Prohibido',
                'Ecos de los Condenados',
                'El Horror Sin Nombre',
                'Voces del Más Allá',
                'Sangre y Rituales',
                'Relatos de Locura',
                'Espectros del Vacío',
                'Crónicas Malditas',
                'El Libro de las Sombras',
                'La Maldición del Olvido',
                'Ritos Ancestrales',
                'El Susurro del Caos',
                'Noche de los Condenados',
                'Los Secretos del Abismo',
                'El Manuscrito Perdido',
                'Crónicas de los Malditos',
                'Ecos de la Locura',
                'El Ritual Prohibido',
                'La Ciudad Sepultada',
                'El Guardián de las Sombras',
                'El Ídolo Olvidado',
                'Cánticos de la Desesperación',
                'La Marca del Caos',
                'Los Susurros del Abismo',
                'El Libro de las Almas Perdidas',
                'Sombras entre las Estrellas',
                'El Culto de las Tinieblas',
                'La Puerta Prohibida'
            ]),
            'idioma' => $this->faker->randomElement(['Español', 'Inglés', 'Francés', 'Alemán']),
            'autor' => $this->faker->name(),
            'anyo' => $this->faker->optional()->numberBetween(1800, 2024),
            'descripcion' => $this->faker->paragraph(3),
            'coste_cordura' => $this->faker->randomElement(array_merge(
                [$this->faker->numberBetween(1, 100)],
                array_map(fn($faces) => $this->faker->numberBetween(1, 10) . 'D' . $faces, [2, 3, 4, 5, 6, 8, 12, 20, 100])
            )),
            'coste_tiempo' => $this->faker->numberBetween(1, 20),
            'mitos' => $this->faker->numberBetween(0, 10),
            'puntuacion' => $this->faker->numberBetween(1, 100),
        ];
    }
}
