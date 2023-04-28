<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => 19, // Monitor
            'full_name' => fake()->name,
            'origin_place' => 'Origin place demo',
            'accept' => fake()->randomElement(['0','1']), // generando un tipo de accept
            'linkage_project' => fake()->randomElement(['PMIE','PMEPUB','PMEPRI','PMGCP','PMMCP','PMR']), // generando un tipo de proyecto
            'participant_type' => fake()->randomElement(['C','NC']), // generando un tipo de participante
            'document_number' => fake()->randomNumber(8),
            'home_address' => 'Demo address',
            'zone' => fake()->randomElement(['U','R']), // generando un tipo de zona
            'conflict_victim' => fake()->randomElement(['0','1']), // generando un tipo de decision
            'distric' => 'Demo distric',
            'gender' => fake()->randomElement(['M','F']), // generando un tipo de genero
            'disability' => fake()->randomElement(['0','1']), // generando un tipo de discapaciodad
            'pathology' => fake()->randomElement(['0','1']), // generando un tipo de patologia
            'blood_type' => fake()->randomElement(['1','2','3','4','5','6','7']), // generando un tipo de blood_type
            'live_with' => 'Demo live_with',
            'scholarship' => fake()->randomElement(['0','1']), // generando un tipo de scholarship
            'affiliation_type' => fake()->randomElement(['SUB','CON','NA']), // generando un tipo de scholarship
            'stratum' => rand(1, 7),
            'phone' => fake()->randomNumber(8), // generando un número de telefono aleatorio único de 8 dígitos
            'email' => fake()->safeEmail,
            'status_id' => rand(1, 8),
            'audited' => fake()->randomElement(['0','1']), // generando si es aditado
            'created_at' => now(),
        ];
    }
}
