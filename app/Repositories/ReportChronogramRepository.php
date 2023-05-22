<?php
namespace App\Repositories;

use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\MethodologistVisit;
use App\Models\ChronogramsGroups;
use App\Models\Chronogram;
use App\Models\Schedule;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;


class ReportChronogramRepository
{ 
  private $cronogram;

  function __construct()
  {
    $this->cronogram = new Chronogram();
  }

  public function generateDoc($id){

    $ChronogramReport = $this->cronogram->findOrFail($id);
    
    $templatePath = public_path('Template/Chronogram/template');
    $outputPath = public_path('Template/Chronogram/template/Chronograma_'. $id .'.docx');


    $templateProcessor = new TemplateProcessor($templatePath);
     
    $data = [
        'update_date' => $ChronogramReport-> updated_at,
        'MONTH' => $ChronogramReport-> mes -> name,
        'MONITOR_name' => $ChronogramReport-> creator -> name,
        'MONITOR_lastname' => $ChronogramReport-> creator -> lastname,
        'zone' => $ChronogramReport-> zone -> name,
        'municipio' => $ChronogramReport-> municipio -> name,
    ];

    $templateProcessor->setValues($data);

    try {
      $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/". $ChronogramReport->file), 'width' => 500, 'height' => 500, 'ratio' => false));
    } catch (\Exception $e) {
    }
    

    $templateProcessor->saveAs($outputPath);

    $relative_path = 'Template/Chronogram/template/Chronograma_'. $id .'.docx';
    return $relative_path;

  }



}
