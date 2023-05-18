<?php

namespace Database\Seeders;

use App\Models\Disciplines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta del archivo Excel con los datos
        $file = storage_path('app/public/disciplines.xlsx');

        // Cargar el archivo Excel mediante la librería PHPSpreadsheet
        $spreadsheet = IOFactory::load($file);

        // Obtener la hoja de cálculo
        $sheet = $spreadsheet->getActiveSheet();

        // Obtener los datos de las filas
        $rows = $sheet->toArray(null, true, true, true);

        // Inicializar el contador
        $counter = 0;
  
        // Recorrer los datos y crear los usuarios
        foreach ($rows as $row) {
            // Saltar la primera fila
            if ($counter === 0) {
                $counter++;
                continue;
            }

            $disciplines = new Disciplines();
            $disciplines->id = $row['A'];
            $disciplines->name = $row['B'];
            $disciplines->save();

            $counter++;
        }
    }
}
