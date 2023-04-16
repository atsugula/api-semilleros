<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiaryGuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beneficiary_guardians')->insert([
            [
                'cedula' => '123456789',
                'firts_name' => 'John',
                'last_name' => 'Doe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cedula' => '987654321',
                'firts_name' => 'Jane',
                'last_name' => 'Doe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cedula' => '456123789',
                'firts_name' => 'Michael',
                'last_name' => 'Scott',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
