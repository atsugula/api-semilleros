<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KnowGuardians;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class KnowGuardiansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 50 registros aleatorios en la tabla know_guardians
        for ($i = 0; $i < 10; $i++) {
            // Create 10 KnowGuardians records
            Factory(KnowGuardian::class, 10)->create();
        }
    }
}
