<?php

namespace Database\Seeders;

use App\Models\HealthEntities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eps = [
            [
                'entity' => 'SUSALUD - SURA - SURAMERICANA E.P.S.'
            ],
            [
                'entity' => 'FONDO DE PASIVO SOCIAL DE LOS FERROCARRILES NACIONALES'
            ],
            [
                'entity' => 'SALUD TOTAL S.A. E.P.S.'
            ],
            [
                'entity' => 'COOSALUD'
            ],
            [
                'entity' => 'E.P.S. SANITAS S.A.'
            ],
            [
                'entity' => 'SOLSALUD E.P.S. S.A.'
            ],
            [
                'entity' => 'COMPARTA EPS-S'
            ],
            [
                'entity' => 'COOMEVA E.P.S. S.A.'
            ],
            [
                'entity' => 'E.P.S. SERVICIO OCCIDENTAL DE SALUD S.A. S.O.S.'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL SER EMPRESA SOLIDARIA DE SALUD A.R.S.'
            ],
            [
                'entity' => 'PIJAOS SALUD EPSI'
            ],
            [
                'entity' => 'EMDISALUD'
            ],
            [
                'entity' => 'MANEXKA EPS INDIGENA'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL EMPRESA SOLIDARIA DE SALUD EMSSANAR EPS'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL LA ESPERANZA ASMET SALUD ESS ESP S'
            ],
            [
                'entity' => 'ASOCIACIÓN INDIGENA DEL CAUCA'
            ],
            [
                'entity' => 'AMBUQ EPS ESS'
            ],
            [
                'entity' => 'DUSAKAWI EPSI'
            ],
            [
                'entity' => 'E.P.S. FAMISANAR LIMITADA CAFAM-COLSUBSIDIO'
            ],
            [
                'entity' => 'HUMANA - VIVIR S.A. E.P.S.'
            ],
            [
                'entity' => 'CRUZ BLANCA E.P.S. S.A.'
            ],
            [
                'entity' => 'SALUDVIDA S.A. E.P.S.'
            ],
            [
                'entity' => 'REG. EXECEP (FOSYGA)'
            ],
            [
                'entity' => 'COLMEDICA E.P.S. - ALIANSALUD'
            ],
            [
                'entity' => 'ECOOPSOS'
            ],
            [
                'entity' => 'MALLAMAS'
            ],
            [
                'entity' => 'ANASWAYUU'
            ],
            [
                'entity' => 'SELVASALUD S.A. E.P.S.'
            ],
            [
                'entity' => 'CCF COLSUBSIDIO'
            ],
            [
                'entity' => 'CAFAM EPS REGIMEN SUBSIDIADO'
            ],
            [
                'entity' => 'COMFACUNDI'
            ],
            [
                'entity' => 'COMPENSAR E.P.S.'
            ],
            [
                'entity' => 'SALUD COLPATRIA E.P.S.'
            ],
            [
                'entity' => 'CAJACOPI EPS'
            ],
            [
                'entity' => 'COMFENALCO VALLE E.P.S.'
            ],
            [
                'entity' => 'E.P.S. PROGRAMA COMFENALCO ANTIOQUIA'
            ],
            [
                'entity' => 'EPS UNIVERSIDAD DE ANTIOQUIA'
            ],
            [
                'entity' => 'CCF DE CORDOBA COMFACOR EPS-S'
            ],
            [
                'entity' => 'COMFAMILIAR HUILA'
            ],
            [
                'entity' => 'COMFAMILIAR NARIÑO'
            ],
            [
                'entity' => 'CCF DEL CHOCO COMFACHOCO EPSS'
            ],
            [
                'entity' => 'COMFABOY'
            ],
            [
                'entity' => 'CAPRESOCA EPS'
            ],
            [
                'entity' => 'CCF DE LA GUAJIRA'
            ],
            [
                'entity' => 'COMFAMILIAR SUCRE'
            ],
            [
                'entity' => 'EPS CAPRECOM'
            ],
            [
                'entity' => 'UNISALUD'
            ],
            [
                'entity' => 'CONVIDA'
            ],
            [
                'entity' => 'GOLDEN GROUP'
            ],
            [
                'entity' => 'NUEVA EPS'
            ],
            [
                'entity' => 'CAPITAL SALUD'
            ],
            [
                'entity' => 'SAVIA SALUD EPS'
            ],
            [
                'entity' => 'FUNDACIÓN SALUDMIA EPS'
            ],
            [
                'entity' => 'MEDIMAS EPS SAS'
            ],
            [
                'entity' => 'SANIDAD MILITAR'
            ],
            [
                'entity' => 'SUSALUD - SURA - SURAMERICANA E.P.S.'
            ],
            [
                'entity' => 'FONDO DE PASIVO SOCIAL DE LOS FERROCARRILES NACIONALES'
            ],
            [
                'entity' => 'SALUD TOTAL S.A. E.P.S.'
            ],
            [
                'entity' => 'COOSALUD'
            ],
            [
                'entity' => 'E.P.S. SANITAS S.A.'
            ],
            [
                'entity' => 'SOLSALUD E.P.S. S.A.'
            ],
            [
                'entity' => 'COMPARTA EPS-S'
            ],
            [
                'entity' => 'COOMEVA E.P.S. S.A.'
            ],
            [
                'entity' => 'E.P.S. SERVICIO OCCIDENTAL DE SALUD S.A. S.O.S.'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL SER EMPRESA SOLIDARIA DE SALUD A.R.S.'
            ],
            [
                'entity' => 'PIJAOS SALUD EPSI'
            ],
            [
                'entity' => 'EMDISALUD'
            ],
            [
                'entity' => 'MANEXKA EPS INDIGENA'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL EMPRESA SOLIDARIA DE SALUD EMSSANAR EPS'
            ],
            [
                'entity' => 'ASOCIACIÓN MUTUAL LA ESPERANZA ASMET SALUD ESS ESP S'
            ],
            [
                'entity' => 'ASOCIACIÓN INDIGENA DEL CAUCA'
            ],
            [
                'entity' => 'AMBUQ EPS ESS'
            ],
            [
                'entity' => 'DUSAKAWI EPSI'
            ],
            [
                'entity' => 'E.P.S. FAMISANAR LIMITADA CAFAM-COLSUBSIDIO'
            ],
            [
                'entity' => 'HUMANA - VIVIR S.A. E.P.S.'
            ],
            [
                'entity' => 'CRUZ BLANCA E.P.S. S.A.'
            ],
            [
                'entity' => 'SALUDVIDA S.A. E.P.S.'
            ],
            [
                'entity' => 'REG. EXECEP (FOSYGA)'
            ],
            [
                'entity' => 'COLMEDICA E.P.S. - ALIANSALUD'
            ],
            [
                'entity' => 'ECOOPSOS'
            ],
            [
                'entity' => 'MALLAMAS'
            ],
            [
                'entity' => 'ANASWAYUU'
            ],
            [
                'entity' => 'SELVASALUD S.A. E.P.S.'
            ],
            [
                'entity' => 'CCF COLSUBSIDIO'
            ],
            [
                'entity' => 'CAFAM EPS REGIMEN SUBSIDIADO'
            ],
            [
                'entity' => 'COMFACUNDI'
            ],
            [
                'entity' => 'COMPENSAR E.P.S.'
            ],
            [
                'entity' => 'SALUD COLPATRIA E.P.S.'
            ],
            [
                'entity' => 'CAJACOPI EPS'
            ],
            [
                'entity' => 'COMFENALCO VALLE E.P.S.'
            ],
            [
                'entity' => 'E.P.S. PROGRAMA COMFENALCO ANTIOQUIA'
            ],
            [
                'entity' => 'EPS UNIVERSIDAD DE ANTIOQUIA'
            ],
            [
                'entity' => 'CCF DE CORDOBA COMFACOR EPS-S'
            ],
            [
                'entity' => 'COMFAMILIAR HUILA'
            ],
            [
                'entity' => 'COMFAMILIAR NARIÑO'
            ],
            [
                'entity' => 'CCF DEL CHOCO COMFACHOCO EPSS'
            ],
            [
                'entity' => 'COMFABOY'
            ],
            [
                'entity' => 'CAPRESOCA EPS'
            ],
            [
                'entity' => 'CCF DE LA GUAJIRA'
            ],
            [
                'entity' => 'COMFAMILIAR SUCRE'
            ],
            [
                'entity' => 'EPS CAPRECOM'
            ],
            [
                'entity' => 'UNISALUD'
            ],
            [
                'entity' => 'CONVIDA'
            ],
            [
                'entity' => 'GOLDEN GROUP'
            ],
            [
                'entity' => 'NUEVA EPS'
            ],
            [
                'entity' => 'CAPITAL SALUD'
            ],
            [
                'entity' => 'SAVIA SALUD EPS'
            ],
            [
                'entity' => 'FUNDACIÓN SALUDMIA EPS'
            ],
            [
                'entity' => 'MEDIMAS EPS SAS'
            ],
            [
                'entity' => 'SANIDAD MILITAR'
            ],
            [
                'entity' => 'COSMITED'
            ],
        ];

        DB::table('health_entities')->insert($eps);

    }
}
