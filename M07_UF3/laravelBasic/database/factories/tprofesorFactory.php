<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\tprofesor;
use Illuminate\Support\Facades\Hash;

class tprofesorFactory extends Factory
{
    protected $model = tprofesor::class;

    public function definition(): array
    {
        // Array de letras para el DNI
        $crcMap = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

        // Generar número de DNI
        $number = str_pad($this->faker->numberBetween(1, 99999999), 8, '0', STR_PAD_LEFT);
        $letter = $crcMap[$number % 23];
        $dni = $number . $letter;

        //Si quisiese faker en español
        //$this->faker->locale('es_ES');


        return [
            'dni' => $dni,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'edad' => $this->faker->numberBetween(25, 65),
            'data_naixement' => $this->faker->date('Y-m-d', '-25 years'),
            'observacions' => $this->faker->optional()->text(200),
        ];
    }
}
