<?php
namespace App\Repositories;

use App\Models\RoleUser;
use App\Repositories\ReportVisitsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use App\Traits\UserDataTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Switch_;

class ZipReportsRepository {

    private $reportVisitsRepository;
    use UserDataTrait;


    public function __construct(ReportVisitsRepository $reportVisitsRepository)
    {
        $this->reportVisitsRepository = $reportVisitsRepository;
    }
    //Monitor deportivo
    public function ChronogramMetodologozip($iduser){
        //se obtiene rol y id de la persona


            $iduser;
            $rol_id = $this->getIdRolUserAuth();
            //$rol_id = 3;

        //Se busca los chronogramas en base de la id y rol de la persona

            $chronogramIds = DB::table('chronograms')
            ->where('status_id', 1)
            ->where('created_by',$iduser)
            ->pluck('id');


        $outputUrls = [];

        if (count($chronogramIds) === 0) {
            $response = [
                'msg' => "no hay ningun archivo aprobado para exportar",
                'url' => null,
            ];

            return $response;
        }


        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($chronogramIds as $chronogramId) {
            $outputUrls[] = $this->reportVisitsRepository->GenerateChronogram($chronogramId);
        }

        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'chronogram_files_'. $rol_id .'.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);

        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = 'downloads/' . $zipFileName;

        // Construir el array asociativo con los datos a devolver
        $response = [
            'msg' => $msg,
            'url' => $relativeUrl,
        ];

        return $response;
    }
    public function BenefisiarieZip($iduser){
        try {
            //se obtiene rol y id de la persona

            $iduser;
            $rol_id = $this->getIdRolUserAuth();

            //Se busca los chronogramas en base de la id y rol de la persona

            $benefesiariesID = DB::table('beneficiaries')
                ->where('status_id', 1)
                ->where('created_by',$iduser)
                ->pluck('id');

            $outputUrls = [];

            if (count($outputUrls) === 0) {
                $response = [
                    'msg' => "no hay ningun archivo aprobado para exportar",
                    'url' => null,
                ];

                return $response;
            }


            //se genera los docs por si no existe alguno o para verificar que todo sea actual
            foreach ($benefesiariesID as $benefisiarie) {
                $outputUrls[] = $this->reportVisitsRepository->GenerateBenefisiaries($benefisiarie);
            }

            // Generar el archivo ZIP y obtener la URL del archivo generado
            $zipFileName = 'benefisiarie_files_'. $rol_id .'.zip';
            $zipFilePath = public_path('downloads/' . $zipFileName);
            $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);

            // Obtener la URL relativa desde la carpeta /storage
            $relativeUrl =  'downloads/' . $zipFileName;

            // Construir el array asociativo con los datos a devolver
            $response = [
                'msg' => $msg,
                'url' => $relativeUrl,
            ];

            return $response;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json($ex->getMessage());
        }
    }

    //Psicologo
    public function ZipCustomVisits($iduser){
        //se obtiene rol y id de la persona

        $iduser;
        $rol_id = $this->getIdRolUserAuth();
        //$rol_id = 3;

        //Se busca los chronogramas en base de la id y rol de la persona

            $customVisitID = DB::table('custom_visits')
            ->where('status_id', 1)
            ->where('created_by',$iduser)
            ->pluck('id');

            if (count($customVisitID) === 0) {
                $response = [
                    'msg' => "no hay ningun archivo aprobado para exportar",
                    'url' => null,
                ];

                return $response;
            }

        $outputUrls = [];
        Log::info($customVisitID);

        if (count($customVisitID) === 0) {
            $response = [
                'msg' => "no hay ningun archivo aprobado para exportar",
                'url' => null,
            ];

            return $response;
        }


        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($customVisitID as $customVisit) {
            $outputUrls[] = $this->reportVisitsRepository->GenerateDocPsychologistcustomVisit($customVisit);
        }

        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'CustomVisits_files_'. $rol_id .'.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);

        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = 'downloads/' . $zipFileName;

        // Construir el array asociativo con los datos a devolver
        $response = [
            'msg' => $msg,
            'url' => $relativeUrl,
        ];

        return $response;
    }
    public function ZipVisitasPsicologicas($iduser){

        $iduser;
        $rol_id = $this->getIdRolUserAuth();
        //$rol_id = 3;

        //Se busca los chronogramas en base de la id y rol de la persona

            $visits_ID = DB::table('psychological_visits')
            ->where('status_id', 1)
            ->where('created_by',$iduser)
            ->pluck('id');

            if (count($visits_ID) === 0) {
                $response = [
                    'msg' => "no hay ningun archivo aprobado para exportar",
                    'url' => null,
                ];

                return $response;
            }

            Log::info($visits_ID);


        $outputUrls = [];

        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($visits_ID as $visits) {
            $outputUrls[] = $this->reportVisitsRepository->GenerateDocReportVisitsRepository($visits);
        }

        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'visits_files_'. $rol_id .'.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);

        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = 'downloads/' . $zipFileName;

        // Construir el array asociativo con los datos a devolver
        $response = [
            'msg' => $msg,
            'url' => $relativeUrl,
        ];

        return $response;
    }
    public function ZipTrasversalAcitvities($iduser){
        //se obtiene rol y id de la persona
        $iduser;
        $rol_id = $this->getIdRolUserAuth();
        //$rol_id = 3;

        //Se busca los chronogramas en base de la id y rol de la persona

            $Trasversal_A_ID = DB::table('transversal_activities')
            ->where('status_id', 1)
            ->where('created_by',$iduser)
            ->pluck('id');

            if (count($Trasversal_A_ID) === 0) {
                $response = [
                    'msg' => "no hay ningun archivo aprobado para exportar",
                    'url' => null,
                ];

                return $response;
            }

            Log::info($Trasversal_A_ID);


        $outputUrls = [];

        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($Trasversal_A_ID as $Activities) {
            $outputUrls[] = $this->reportVisitsRepository->GeneratedocPsychologisttransversalActivity($Activities);
        }

        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'transversal_activities_files_'. $rol_id .'.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);

        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = 'downloads/' . $zipFileName;

        // Construir el array asociativo con los datos a devolver
        $response = [
            'msg' => $msg,
            'url' => $relativeUrl,
        ];

        return $response;
    }



    function createZipFromUrls(array $fileUrls, $zipFileName)
    {
        $zip = new ZipArchive();

        // Crear el archivo ZIP
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // Recorrer las URLs de los archivos y agregarlos al archivo ZIP
            foreach ($fileUrls as $index => $fileUrl) {
                $fileContent = file_get_contents($fileUrl);

                if ($fileContent !== false) {
                    $fileName = basename($fileUrl);

                    // Agregar el archivo al ZIP
                    $zip->addFromString($fileName, $fileContent);
                } else {
                    // Si no se puede obtener el contenido del archivo, muestra un mensaje de error
                    echo "Error al leer el archivo de la URL: {$fileUrl}. Archivo omitido.\n";
                }
            }

            // Cerrar el archivo ZIP
            $zip->close();

            return "Archivo ZIP creado exitosamente";
        } else {
            return "Error al crear el archivo ZIP";
        }
    }
}
