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
    $grupo = $ChronogramReport->load('groups');
    
    $templatePath = public_path('Template/Chronogram/template');
    $outputPath = public_path('Template/Chronogram/template/Chronograma_'. $id .'.docx');


    $templateProcessor = new TemplateProcessor($templatePath);
     
    $data = [
        'update_date' => $grupo-> updated_at,
        'MONTH' => $grupo-> mes -> name,
        'MONITOR_name' => $grupo-> creator -> name,
        'MONITOR_lastname' => $grupo-> creator -> lastname,
        'zone' => $grupo-> zone -> name,
        'municipio' => $grupo-> municipio -> name,
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
