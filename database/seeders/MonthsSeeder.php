<?php

namespace Database\Seeders;

use App\Models\Months;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class MonthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Months::create([
            'name' => 'Enero'
        ]);

        Months::create([
            'name' => 'Febrero'
        ]);

        Months::create([
            'name' => 'Marzo'
        ]);

        Months::create([
            'name' => 'Abril'
        ]);

        Months::create([
            'name' => 'Mayo'
        ]);

        Months::create([
            'name' => 'Junio'
        ]);

        Months::create([
            'name' => 'Julio'
        ]);

        Months::create([
            'name' => 'Agosto'
        ]);

        Months::create([
            'name' => 'Septiembre'
        ]);

        Months::create([
            'name' => 'Octubre'
        ]);

        Months::create([
            'name' => 'Noviembre'
        ]);

        Months::create([
            'name' => 'Diciembre'
        ]);

    }
}
