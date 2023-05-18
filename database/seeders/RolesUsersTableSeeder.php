<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta del archivo Excel con los datos
        $file = storage_path('app/public/role_users.xlsx');

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

            $user_rol = new RoleUser();
            $user_rol->user_id = $row['A'];
            $user_rol->role_id = $row['B'];
            $user_rol->save();

            $counter++;
        }
    }
}
