<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
use App\Models\BeneficiaryGuardians;
use App\Models\KnowGuardians;
use App\Models\NavigationHistory;
use Illuminate\Database\Seeder;
use App\Models\RoleUser;
use App\Models\User;

class DataFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios falsos para pruebas
        // User::factory()->count(1000)->create();
        //RoleUser::factory()->count(1000)->create();

        //NavigationHistory::factory()->count(10000)->create();

        // Benfiaciarios falsos para pruebas
        $guardians = BeneficiaryGuardians::factory()->count(100)->create();
        Beneficiary::factory()->count(100)->create();
        foreach ($guardians as $guardian) {
            KnowGuardians::firstOrCreate([
                'id_guardian' => $guardian->id,
                'id_beneficiary' => $guardian->id,
                'relationship' => fake()->randomElement(['Abuelo', 'Abuela', 'Padre', 'Madre', 'Hermano', 'Hermana', 'Tio', 'Tia', 'Padrastro', 'Madrastra', 'Padrino', 'Madrina', 'Primo', 'Prima']),
                'find_out' => json_encode([]),
                'social_media' => json_encode([]),
                'created_at' => now()
            ]);
        }
    }
}
