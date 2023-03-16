<?php

namespace Database\Seeders;

use App\Models\Validity_period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidityPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Validity_period::Create([
            'consecutive' => '1',
            'term' => 'Primer Semestre',
            'start_date' => '2022-01-01',
            'final_date' => '2022-06-30',
            'cap_date' => '2022-07-01',
            'cap' => '2022-1',
            'cap_certificate' => '2022-1-certificate',
        ]);

        Validity_period::Create([
            'consecutive' => '2',
            'term' => 'Segundo Semestre',
            'start_date' => '2022-11-01',
            'final_date' => '2022-12-30',
            'cap_date' => '2022-07-01',
            'cap' => '2022-1',
            'cap_certificate' => '2022-1-certificate',
        ]);
    }
}
