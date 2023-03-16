<?php

namespace Database\Seeders;

use App\Models\BankAccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccountType::create(
            [
                'name' => 'Cuenta Corriente',
            ]
        );
        BankAccountType::create(
            [
                'name' => 'Cuenta de Ahorros'
            ]
        );
    }
}
