<?php

namespace Database\Seeders;

use App\Models\NameClauses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NameClausesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NameClauses::create([
            'name' => '2. Plazo'
        ]);

        NameClauses::create([
            'name' => '3. Obligaciones generales de las partes'
        ]);

        NameClauses::create([
            'name' => '4. Actividades específicas de la Contratista'
        ]);

        NameClauses::create([
            'name' => '6. Forma de pago:'
        ]);

        NameClauses::create([
            'name' => '7. Garantía:'
        ]);

        NameClauses::create([
            'name' => '8. Información bancaria:'
        ]);

        NameClauses::create([
            'name' => '9. Independencia:'
        ]);

        NameClauses::create([
            'name' => '10. Supervisión:'
        ]);

        NameClauses::create([
            'name' => '11. Causales de Terminación'
        ]);

        NameClauses::create([
            'name' => '12. Prorrogas:'
        ]);

        NameClauses::create([
            'name' => '13. Suspensión Del Contrato'
        ]);

        NameClauses::create([
            'name' => '13. Suspensión Del Contrato'
        ]);

        NameClauses::create([
            'name' => '14. Cesión del contrato'
        ]);

        NameClauses::create([
            'name' => '15. Propiedad intelectual'
        ]);

        NameClauses::create([
            'name' => '16. Multas'
        ]);

        NameClauses::create([
            'name' => '17. Cláusula penal'
        ]);

        NameClauses::create([
            'name' => '18. Confidencialidad'
        ]);

        NameClauses::create([
            'name' => '19. Controversias'
        ]);

        NameClauses::create([
            'name' => '20. Documentos integrantes del contrato'
        ]);

        NameClauses::create([
            'name' => '21. Requisitos de  perfeccionamiento  y  ejecución'
        ]);

        NameClauses::create([
            'name' => '22. Declaraciones'
        ]);

        NameClauses::create([
            'name' => '23. Domicilio'
        ]);

        NameClauses::create([
            'name' => '24. Notificaciones'
        ]);
    }
}
