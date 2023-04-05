<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 50; $i++) {
            $knowGuardian = new KnowGuardian();
            $knowGuardian->id_guardian = rand(1, 20); // assuming there are 20 guardians
            $knowGuardian->id_beneficiary = rand(1, 50); // assuming there are 50 beneficiaries
            $knowGuardian->know_needs = rand(0, 1);
            $knowGuardian->concept = rand(1, 10);
            $knowGuardian->save();
        }
    }
}
