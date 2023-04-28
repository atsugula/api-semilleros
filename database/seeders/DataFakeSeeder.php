<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
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
        User::factory()->count(1000)->create();
        RoleUser::factory()->count(1000)->create();
        Beneficiary::factory()->count(100)->create();
        NavigationHistory::factory()->count(10000)->create();
    }
}
