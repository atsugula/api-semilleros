<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener el último ID de la tabla users
        // $lastUserId = optional(DB::table('users')->latest('id')->first())->id ?? 0;

        // Ruta del archivo Excel con los datos
        $file = storage_path('app/public/users.xlsx');

        // Cargar el archivo Excel mediante la librería PHPSpreadsheet
        $spreadsheet = IOFactory::load($file);

        // Obtener la hoja de cálculo
        $sheet = $spreadsheet->getActiveSheet();

        // Obtener los datos de las filas
        $rows = $sheet->toArray(null, true, true, true);
        //$id = 40;
        // Recorrer los datos y crear los usuarios
        // Inicializar el contador
        $counter = 0;

        // Recorrer los datos y crear los usuarios
        foreach ($rows as $row) {
            // Saltar la primera fila
            if ($counter === 0) {
                $counter++;
                continue;
            }

            $user = new User();
            $user->id = $row['A'];
            $user->name = $row['B'];
            $user->lastname = $row['C'];
            $user->address = $row['D'];
            $user->document_number = $row['E'];
            $user->document_type = $row['F'];
            $user->phone = $row['G'];
            $user->gender = $row['H'];
            $user->email = $row['I'];
            $user->password = Hash::make($row['E']);
            $user->save();
            // Guardar el ID del usuario creado y la cédula en el metodologo
            $userIdsAndCedulas[] = [
                'userId' => $user->id,
                'cedula' => $row['J'],
            ];

            $counter++;
        }
        // Recorrer el array y asignar el methodology_id
        foreach ($userIdsAndCedulas as $data) {
            $user = User::find($data['userId']);
            $cedula = $data['cedula'];

            // Buscar el usuario con la cédula correspondiente
            $relatedUser = User::where('document_number', $cedula)->first();

            if ($relatedUser) {
                $user->methodology_id = $relatedUser->id;
                $user->save();
            }
        }
    }
}
