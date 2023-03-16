<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name' => 'Bancolombia'
        ]);

        Bank::create([
            'name' => 'Banco de Bogotá'
        ]);

        Bank::create([
            'name' => 'Davivienda'
        ]);

        Bank::create([
            'name' => 'BBVA'
        ]);

        Bank::create([
            'name' => 'Banco de Occidente'
        ]);

        Bank::create([
            'name' => 'Scotiabank Colpatria'
        ]);

        Bank::create([
            'name' => 'Banco Itaú'
        ]);

        Bank::create([
            'name' => 'GNB Sudameris'
        ]);

        Bank::create([
            'name' => 'Banco Agrario'
        ]);

        Bank::create([
            'name' => 'Banco Popular'
        ]);

        Bank::create([
            'name' => 'Banco Caja Social'
        ]);

        Bank::create([
            'name' => 'Banco AV Villas'
        ]);

        Bank::create([
            'name' => 'Banco Union'
        ]);

        Bank::create([
            'name' => 'Bancoomeva'
        ]);

        Bank::create([
            'name' => 'Banco Falabella'
        ]);

        Bank::create([
            'name' => 'Banco Pichincha'
        ]);

        Bank::create([
            'name' => 'Banco W'
        ]);

        Bank::create([
            'name' => 'Banco Finandina'
        ]);

        Bank::create([
            'name' => 'Bancamia'
        ]);

        Bank::create([
            'name' => 'Banco Credifinanciera'
        ]);

        Bank::create([
            'name' => 'Banco Cooperativo Coopcentral'
        ]);

        Bank::create([
            'name' => 'Bancoldex'
        ]);



    }
}
