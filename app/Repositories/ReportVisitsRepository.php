<?php
namespace App\Repositories;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;


class ReportVisitsRepository
{ 

  public function generateDoc(){
    $templateProcessor = new TemplateProcessor(asset('Template\metodologo\Metodologist_Visit.docx'));
     
    $data = [
      'name' => 'Juan',
    ];
    $templateProcessor->setValues($data);
    $templateProcessor->saveAs('Template\metodologo\Metodologist_Visit.docx');

  }

}