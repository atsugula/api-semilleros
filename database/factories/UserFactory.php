<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => fake()->name,
            // 'lastname' => fake()->lastname,
            'email' => fake()->safeEmail,
            'password' => bcrypt('password'), // cambiar por una contraseña segura
            // 'document_number' => fake()->unique()->randomNumber(8), // generando un número de documento aleatorio único de 8 dígitos
            // 'document_type' => fake()->randomElement(['DNI', 'NIE', 'Pasaporte']), // generando un tipo de documento aleatorio
        ];
    }
}
