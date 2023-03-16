<?php

namespace Database\Seeders;

use App\Models\Nac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            // Super
            [
                'contractor_full_name' => 'Jefri Martínezs',
                'phone' => '5676797567',
                'document_number' => '5676797567',
                'user_id' => 1,
                'address' => 'DIRECCION DE PRUEBA',
                'gender' => 'MASCULINO',
                'document_type' => 'CC',
            ],
            // Root
            [
                'contractor_full_name' => 'alejandro',
                'phone' => '5465468786',
                'document_number' => '5465468786',
                'user_id' => 2,
                'address' => 'DIRECCION DE PRUEBA',
                'gender' => 'MASCULINO',
                'document_type' => 'CC',
            ],
            // ASISTENTES Y AUXILIARES ADMINISTRATIVOS
            [
                'contractor_full_name' => 'auxiliar1',
                'phone' => '5465468786',
                'document_number' => '5465468786',
                'user_id' => 3,
                'address' => 'DIRECCION DE PRUEBA',
                'gender' => 'MASCULINO',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar2',
                'address' => 'CRA.94A #42-61',
                'gender' => 'Femenino',
                'document_number' => '38567996',
                'document_type' => 'CC',
                'phone' => '38567996',
                'user_id' => 4,
            ],
            [
                'contractor_full_name' => 'auxiliar3',
                'document_number' => '1112489267',
                'phone' => '1112489267',
                'user_id' => 5,
                'address' => 'CALLE 12 # 35 OESTE 100 ',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar4',
                'document_number' => '94417713',
                'phone' => '94417713',
                'user_id' => 6,
                'address' => 'CALLE 50 #3N-60',
                'gender' => 'Masculino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar5',
                'document_number' => '29233976',
                'phone' => '29233976',
                'user_id' => 7,
                'address' => 'CALLE 69 #1-440',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar6',
                'document_number' => '31902881',
                'phone' => '31902881',
                'user_id' => 8,
                'address' => 'CALLE 48 # 28G--34',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar7',
                'document_number' => '192803',
                'phone' => '7092803',
                'user_id' => 9,
                'address' => 'CRA. 27 #3-38',
                'gender' => 'Masculino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'auxiliar8',
                'document_number' => '1107092803',
                'phone' => '1107092803',
                'user_id' => 10,
                'address' => 'CRA. 27 #3-38',
                'gender' => 'Masculino',
                'document_type' => 'CC',
            ],


            //JURIDICOS
            [
                'contractor_full_name' => 'juridico1',
                'phone' => '5465468786',
                'document_number' => '54687336',
                'user_id' => 11,
                'address' => 'DIRECCION DE PRUEBA',
                'gender' => 'MASCULINO',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico2',
                'address' => 'CRA.94A #42-61',
                'gender' => 'Femenino',
                'document_number' => '78963146',
                'document_type' => 'CC',
                'phone' => '3822996',
                'user_id' => 12,
            ],
            [
                'contractor_full_name' => 'juridico3',
                'document_number' => '113312',
                'phone' => '13311267',
                'user_id' => 13,
                'address' => 'CALLE 12 # 35 OESTE 100 ',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico4',
                'document_number' => '4001713',
                'phone' => '987713',
                'user_id' => 14,
                'address' => 'CALLE 50 #3N-60',
                'gender' => 'Masculino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico5',
                'document_number' => '993976',
                'phone' => '10233976',
                'user_id' => 15,
                'address' => 'CALLE 69 #1-440',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico6',
                'document_number' => '002881',
                'phone' => '75902881',
                'user_id' => 16,
                'address' => 'CALLE 48 # 28G--34',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridio7',
                'document_number' => '127092803',
                'phone' => '70892803',
                'user_id' => 17,
                'address' => 'CRA. 27 #3-38',
                'gender' => 'Masculino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico8',
                'document_number' => '9005368219',
                'phone' => '12368219',
                'user_id' => 18,
                'address' => 'CALLE 18#6N-7',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],

             //SUPERVISORES
            [
                'contractor_full_name' => 'juridico1',
                'document_number' => '985417',
                'phone' => '65147',
                'user_id' => 19,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico2',
                'document_number' => '96314',
                'phone' => '748511',
                'user_id' => 20,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico3',
                'document_number' => '654781',
                'phone' => '1136059849',
                'user_id' => 21,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico4',
                'document_number' => '1136059849',
                'phone' => '1136059849',
                'user_id' => 22,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico5',
                'document_number' => '11322249',
                'phone' => '3687111',
                'user_id' => 23,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico6',
                'document_number' => '1136059849',
                'phone' => '1136059849',
                'user_id' => 24,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico7',
                'document_number' => '951743',
                'phone' => '01254789',
                'user_id' => 17,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ],
            [
                'contractor_full_name' => 'juridico8',
                'document_number' => '96314785',
                'phone' => '54781230',
                'user_id' => 17,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
            ]
           /* [
                'contractor_full_name' => 'KATHERINE MARTINEZ SANDOVAL',
                'address' => 'CRA.94A #42-61',
                'gender' => 'Femenino',
                'document_number' => '38567996',
                'document_type' => 'CC',
                'phone' => '38567996',
                'user_id' => 3,
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'CINDY JOHANNA FLOREZ UPARELA',
                'document_number' => '1112489267',
                'phone' => '1112489267',
                'user_id' => 4,
                'address' => 'CALLE 12 # 35 OESTE 100 ',
                'gender' => 'Femenino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'JUAN MAURICIO DINAS RODRIGUEZ',
                'document_number' => '94417713',
                'phone' => '94417713',
                'user_id' => 5,
                'address' => 'CALLE 50 #3N-60',
                'gender' => 'Masculino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'DIANA CRISTINA GARCIA CASTRO',
                'document_number' => '29233976',
                'phone' => '29233976',
                'user_id' => 6,
                'address' => 'CALLE 69 #1-440',
                'gender' => 'Femenino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'MARTHA LUCIA GONZALEZ',
                'document_number' => '31902881',
                'phone' => '31902881',
                'user_id' => 7,
                'address' => 'CALLE 48 # 28G--34',
                'gender' => 'Femenino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'TOMAS  MENDEZ ORTIZ',
                'document_number' => '1107092803',
                'phone' => '1107092803',
                'user_id' => 8,
                'address' => 'CRA. 27 #3-38',
                'gender' => 'Masculino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'NATALIA TIRADO CAMACHO',
                'document_number' => '1005368219',
                'phone' => '1005368219',
                'user_id' => 9,
                'address' => 'CALLE 18#6N-7',
                'gender' => 'Femenino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],
            [
                'contractor_full_name' => 'LITZA ANDREA CIFUENTES GOMEZ',
                'document_number' => '1136059849',
                'phone' => '1136059849',
                'user_id' => 9,
                'address' => 'CALLE 50 # 28 E 37 DOCE DE OCTUBRE -CALI',
                'gender' => 'Femenino',
                'document_type' => 'CC',
                // 'role_id' => 8
            ],*/
        ];

        foreach ($profiles as $profile) {
            DB::table('profiles')->insert($profile);
        }
    }
}
