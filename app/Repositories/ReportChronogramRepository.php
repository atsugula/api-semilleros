<?php
namespace App\Repositories;

use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\MethodologistVisit;
use App\Models\ChronogramsGroups;
use App\Models\Chronogram;
use App\Models\Schedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;

class ReportChronogramRepository
{ 
  private $cronogram;

  function __construct()
  {
    $this->cronogram = new Chronogram();
  }

  public function generateDoc($id)
  {
    try {
      $ChronogramReport = $this->cronogram->findOrFail($id);
      try{
        $grupo = $ChronogramReport->load('groups');
    
        $templatePath = public_path('Template/Chronogram/Template');
        $outputPath = public_path('Template/Chronogram/template/Chronograma_'. $id .'.docx');
    
        $templateProcessor = new TemplateProcessor($templatePath);

        try{
          $data = [
            'update_date' => $grupo->updated_at,
            'MONTH' => $grupo->mes->name,
            'MONITOR_name' => $grupo->creator->name,
            'MONITOR_lastname' => $grupo->creator->lastname,
            'zone' => $grupo->zone->name,
            'municipio' => $grupo->municipio->name,
        ];
    
        $templateProcessor->setValues($data);
        $groups = $grupo->groups;
        $tableData = [];
        foreach ($groups as $index => $group) {
          $tableData[] = [
            'idG' . ($index + 1) => $group->id,
            'modDep' . ($index + 1) => $group->sports_modality,
            'DLUN' . ($index + 1) => $this->getScheduleTime($group, 'DLUN'),
            'SHDLUST' . ($index + 1) => $this->getScheduleTime($group, 'SHDLUST'),
            'DMAR' . ($index + 1) => $this->getScheduleTime($group, 'DMAR'),
            'SHDMART' . ($index + 1) => $this->getScheduleTime($group, 'SHDMART'),
            'DMIE' . ($index + 1) => $this->getScheduleTime($group, 'DMIE'),
            'SHDMIEST' . ($index + 1) => $this->getScheduleTime($group, 'SHDMIEST'),
            'DJUE' . ($index + 1) => $this->getScheduleTime($group, 'DJUE'),
            'SHDJUEST' . ($index + 1) => $this->getScheduleTime($group, 'SHDJUEST'),
            'DVIE' . ($index + 1) => $this->getScheduleTime($group, 'DVIE'),
            'SHDVIEST' . ($index + 1) => $this->getScheduleTime($group, 'SHDVIEST'),
            'DSABN' . ($index + 1) => $this->getScheduleTime($group, 'DSABN'),
            'SHDSABST' . ($index + 1) => $this->getScheduleTime($group, 'SHDSABST'),
            'GNEDP' . ($index + 1) => $group->main_sports_stage_name,
            'GDEDP' . ($index + 1) => $group->main_sports_stage_address,
            'GDEDA' . ($index + 1) => $group->alt_sports_stage_address,
          ];
        }
    
        $templateProcessor->cloneRowAndSetValues('idG1', $tableData);
        $templateProcessor->saveAs($outputPath);
    
        $relativePath = 'Template/Chronogram/template/Chronograma_' . $id . '.docx';
        }catch(\Exception $e){
          Log::error('3'. $e->getMessage());
        } 
        
        return $relativePath;
      }catch(\Exception $ex){
        Log::error($ex->getMessage());
        return $ex;
      }
      
       }catch (\Exception $e) {
      Log::error('Error al encontrar el registro: ' . $e->getMessage());
      return 'Error al encontrar el registro';
    }
    
  }

  private function getScheduleTime($group, $day)
  {
    $schedules = $group->schedules;
    foreach ($schedules as $schedule) {
      if ($schedule->day === $day) {
        return $schedule->start_time . ' - ' . $schedule->end_time;
      }
    }
    return '';
  }
}

