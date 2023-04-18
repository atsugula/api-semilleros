<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
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
        User::factory()->count(100)->create();
        RoleUser::factory()->count(100)->create();
        Beneficiary::factory()->count(100)->create();
    }
}
