<?php
namespace App\Repositories;

use App\Repositories\ReportVisitsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use App\Traits\UserDataTrait;
use PhpParser\Node\Stmt\Switch_;

class ZipReportsRepository {

    private $reportVisitsRepository;
    use UserDataTrait;

    public function __construct(ReportVisitsRepository $reportVisitsRepository)
    {
        $this->reportVisitsRepository = $reportVisitsRepository;
    }

    public function ChronogramMetodologozip(){
        //se obtiene rol y id de la persona
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        //Se busca los chronogramas en base de la id y rol de la persona
        switch ($rol_id){
        case 1:
        case 2:
        case 3:
            $chronogramIds = DB::table('chronograms')
            ->where('status_id', 1)
            ->pluck('id');
            break;
        case 10: 
            $chronogramIds = DB::table('chronograms')
            ->where('status_id', 1)
            ->where('revised_by',$user_id)
            ->pluck('id');
            break;        
        }
        
        $outputUrls = [];
    
        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($chronogramIds as $chronogramId) {
            $outputUrls[] = $this->reportVisitsRepository->GenerateChronogram($chronogramId);
        }
        
        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'chronogram_files_'. $rol_id .'.zip';
        $zipFilePath = storage_path('app/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);
    
        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = Storage::url($zipFileName);
    
        // Construir el array asociativo con los datos a devolver
        $response = [
            'msg' => $msg,
            'url' => $relativeUrl,
        ];
    
        return $response;
    }

    public function BenefisiarieZip(){
        //se obtiene rol y id de la persona
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        //Se busca los chronogramas en base de la id y rol de la persona
        switch ($rol_id){
        case 1:
        case 2:
        case 3:
            $benefesiariesID = DB::table('beneficiaries')
            ->where('status_id', 1)
            ->pluck('id');
            break;
        case 10: 
            $benefesiariesID = DB::table('beneficiaries')
            ->where('status_id', 1)
            ->where('revised_by',$user_id)
            ->pluck('id');
            break;        
        }
        
        $outputUrls = [];
    
        //se genera los docs por si no existe alguno o para verificar que todo sea actual
        foreach ($benefesiariesID as $benefisiarie) {
            $outputUrls[] = $this->reportVisitsRepository->GenerateBenefisiaries($benefisiarie);
        }
        
        // Generar el archivo ZIP y obtener la URL del archivo generado
        $zipFileName = 'benefisiarie_files_'. $rol_id .'.zip';
        $zipFilePath = storage_path('app/' . $zipFileName);
        $msg = $this->createZipFromUrls($outputUrls, $zipFilePath);
    
        // Obtener la URL relativa desde la carpeta /storage
        $relativeUrl = Storage::url($zipFileName);
    
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
