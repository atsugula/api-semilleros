<?php
namespace App\Repositories;

use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\MethodologistVisit;
use App\Models\VisitSubDirector;
use App\Models\TransversalActivity;
use App\Models\CustomVisit;
use App\Models\psychologistVisits;

use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;


class ReportVisitsRepository
{ 
  private $MethodologistVisit;
  private $psychologistVisit;
  private $visitSubDirector;
  private $PsychologisttransversalActivity;
  private $PsychologistcustomVisit;

  function __construct()
  {
    $this->MethodologistVisit = new MethodologistVisit();
    $this->psychologistVisit = new psychologistVisits();
    $this->visitSubDirector = new VisitSubDirector();
    $this->PsychologisttransversalActivity = new TransversalActivity();
    $this->PsychologistcustomVisit = new CustomVisit();
  }

  public function generateDoc($id){

    $MethodologistVisitReport = $this->MethodologistVisit->findOrFail($id);
    
    $templatePath = public_path('Template/metodologo/Metodologist_Visit.docx');
    $outputPath = public_path('Template/metodologo/Metodologist_Visit_'. $id .'.docx');


    $templateProcessor = new TemplateProcessor($templatePath);
     
    $data = [
      'metodologo' => $MethodologistVisitReport->creator->name,
      'fecha' => $MethodologistVisitReport->date_visit,
      'hora' => $MethodologistVisitReport->hour_visit,
      'escenario' => $MethodologistVisitReport->sports_scene,
      'monitor' => $MethodologistVisitReport->monitor->name,
      'disciplines' => $MethodologistVisitReport->disciplines->name,
      'hour_visit' => $MethodologistVisitReport->hour_visit,
      'municipalities' => $MethodologistVisitReport->municipalities->name,
      'beneficiarycoverage' => $MethodologistVisitReport->beneficiary_coverage,
      'status' => $MethodologistVisitReport->status->name,
      'corregimiento'=> $MethodologistVisitReport->sidewalk,
      'region' => $MethodologistVisitReport->municipalities->zone_id,
      'plantrpositivo' =>$MethodologistVisitReport->swich_plans_r ==1 ? 'SI' :' ',
      'planRNegativo' =>$MethodologistVisitReport->swich_plans_r ==0 ? 'NO' :'',
      'SPW1P' =>$MethodologistVisitReport->swich_plans_sc_1 ==1 ? 'SI' :' ',
      'SPW1N' =>$MethodologistVisitReport->swich_plans_sc_1 ==0 ? 'NO' :'',
      'SPW2P' =>$MethodologistVisitReport->swich_plans_sc_2 ==1 ? 'SI' :' ',
      'SPW2N' =>$MethodologistVisitReport->swich_plans_sc_2 ==0 ? 'NO' :'',
      'SPW3P' =>$MethodologistVisitReport->swich_plans_sc_3 ==1 ? 'SI' :' ',
      'SPW3N' =>$MethodologistVisitReport->swich_plans_sc_3 ==0 ? 'NO' :'',
      'SPW4P' =>$MethodologistVisitReport->swich_plans_sc_4 ==1 ? 'SI' :' ',
      'SPW4N' =>$MethodologistVisitReport->swich_plans_sc_4 ==0 ? 'NO' :'',
      'SPGMP1' =>$MethodologistVisitReport->swich_plans_gm_1 ==1 ? 'SI' :' ',
      'SPGMN1' =>$MethodologistVisitReport->swich_plans_gm_1 ==0 ? 'NO' :'',
      'SPGMP2' =>$MethodologistVisitReport->swich_plans_gm_2 ==1 ? 'SI' :' ',
      'SPGMN2' =>$MethodologistVisitReport->swich_plans_gm_2 ==0 ? 'NO' :'',
      'SPGMP3' =>$MethodologistVisitReport->swich_plans_gm_3 ==1 ? 'SI' :' ',
      'SPGMN3' =>$MethodologistVisitReport->swich_plans_gm_3 ==0 ? 'NO' :'',
      'SPGMP4' =>$MethodologistVisitReport->swich_plans_gm_4 ==1 ? 'SI' :' ',
      'SPGMN4' =>$MethodologistVisitReport->swich_plans_gm_4 ==0 ? 'NO' :'',
      'SPGMP5' =>$MethodologistVisitReport->swich_plans_gm_5 ==1 ? 'SI' :' ',
      'SPGMN5' =>$MethodologistVisitReport->swich_plans_gm_5 ==0 ? 'NO' :'',
      'SPGMP6' =>$MethodologistVisitReport->swich_plans_gm_6 ==1 ? 'SI' :' ',
      'SPGMN6' =>$MethodologistVisitReport->swich_plans_gm_6 ==0 ? 'NO' :'',
      'SPMP1P' =>$MethodologistVisitReport->swich_plans_mp_1 ==1 ? 'SI' :' ',
      'SPMP1N' =>$MethodologistVisitReport->swich_plans_mp_1 ==0 ? 'NO' :'',
      'SPMP2P' =>$MethodologistVisitReport->swich_plans_mp_2 ==1 ? 'SI' :' ',
      'SPMP2N' =>$MethodologistVisitReport->swich_plans_mp_2 ==0 ? 'NO' :'',
      'SPMP3P' =>$MethodologistVisitReport->swich_plans_mp_3 ==1 ? 'SI' :' ',
      'SPMP3N' =>$MethodologistVisitReport->swich_plans_mp_3 ==0 ? 'NO' :'',
      'SPMP4P' =>$MethodologistVisitReport->swich_plans_mp_4 ==1 ? 'SI' :' ',
      'SPMP4N' =>$MethodologistVisitReport->swich_plans_mp_4 ==0 ? 'NO' :'',
      'SPMP5P' =>$MethodologistVisitReport->swich_plans_mp_5 ==1 ? 'SI' :' ',
      'SPMP5N' =>$MethodologistVisitReport->swich_plans_mp_5 ==0 ? 'NO' :'',
      'observaciones' =>$MethodologistVisitReport->observations,
    ];
    $templateProcessor->setValues($data);

    try {
      $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/". $MethodologistVisitReport->file), 'width' => 500, 'height' => 500, 'ratio' => false));
    } catch (\Exception $e) {
    }
    

    $templateProcessor->saveAs($outputPath);

    $relative_path = 'Template/metodologo/Metodologist_Visit_'. $id .'.docx';
    return $relative_path;

  }

  public function GenerateDocReportVisitsRepository($id){
      
      $psychologistVisitReport = $this->psychologistVisit->findOrFail($id);

      $Psycologic_name = str_replace(' ', '_', $psychologistVisitReport->createdBY->name);
      
      $templatePath = public_path('Template/psicosocial/visitas/plantilla.docx');
      $outputPath = public_path('Template/psicosocial/visitas/'.$id.'_Visita_psicologica_'.$Psycologic_name.'.docx');

      $templateProcessor = new TemplateProcessor($templatePath);

      $data = [
        "region" => $psychologistVisitReport->municipalities->zone_id,
        "fecha" => $psychologistVisitReport->date_visit,
        "municipalitie" => $psychologistVisitReport->municipalities->name,
        "psi_name" => $psychologistVisitReport->createdBY->lastname,
        "psi_lastname" => $psychologistVisitReport->createdBY->last,
        "monitor_name" => $psychologistVisitReport->monitor->name,
        "monitor_lastname" => $psychologistVisitReport->monitor->lastname,
        "discipline" => $psychologistVisitReport->discipline->name,
        "n_ben" => $psychologistVisitReport->number_beneficiaries,
        "scenary" => $psychologistVisitReport->scenery,
        "obj.activity" => $psychologistVisitReport->objetive


      ];

      $templateProcessor->setValues($data);

      $templateProcessor->saveAs($outputPath);

      $relative_path = 'Template/psicosocial/visitas/'.$id.'_Visita_psicologica_'.$Psycologic_name.'.docx';

      return $relative_path;


  }

  public function GenerateDocPsychologistcustomVisit($id){

    $psychologistCustomVisitReport = $this->PsychologistcustomVisit->findOrFail($id);

    $Psycologic_name = str_replace(' ', '_', $psychologistCustomVisitReport->createdBY->name);
    
    $templatePath = public_path('Template/psicosocial/Psicosocialvisitaspersonalizadas/plantilla.docx');
    $outputPath = public_path('Template/psicosocial/Psicosocialvisitaspersonalizadas/'.$id.'_Visita_personalizada_psicologica_'.$Psycologic_name.'.docx');

    $templateProcessor = new TemplateProcessor($templatePath);

    $data = [
      "region" => $psychologistCustomVisitReport->municipalities->zone_id,
    ];

    $templateProcessor->setValues($data);

    $templateProcessor->saveAs($outputPath);

    $relative_path = 'Template/psicosocial/Psicosocialvisitaspersonalizadas/'.$id.'_Visita_personalizada_psicologica_'.$Psycologic_name.'.docx';

    return $relative_path;
  }

  Public function GeneratedocPsychologisttransversalActivity($id){
      
      $psychologistTransversalActivity = $this->PsychologisttransversalActivity->findOrFail($id);
  
      $Psycologic_name = str_replace(' ', '_', $psychologistTransversalActivity->creator->name);
      
      $templatePath = public_path('Template/psicosocial/actividades-transversales/plantilla.docx');
      $outputPath = public_path('Template/psicosocial/actividades-transversales/'.$id.'_Actividad_transversal_psicologica_'.$Psycologic_name.'.docx');
  
      $templateProcessor = new TemplateProcessor($templatePath);
  
      $data = [
        "region" => $psychologistTransversalActivity->municipalities->zone_id,
      ];
  
      $templateProcessor->setValues($data);
  
      $templateProcessor->saveAs($outputPath);
  
      $relative_path = 'Template/psicosocial/actividades-transversales/'.$id.'_Actividad_transversal_psicologica_'.$Psycologic_name.'.docx';
  
      return $relative_path;
  
  }

  Public function GeneratedocvisitSubDirector($id){
        
        $visitSubDirector = $this->visitSubDirector->findOrFail($id);
    
        $sub_director_name = str_replace(' ', '_', $visitSubDirector->creator->name);
        
        $templatePath = public_path('Template/Sub_director/visita/plantilla.docx');
        $outputPath = public_path('Template/Sub_director/visita/'.$id.'_Visita_subdirector_'.$sub_director_name .'.docx');
    
        $templateProcessor = new TemplateProcessor($templatePath);
    
        $data = [
          "region" => $visitSubDirector->municipalities->zone_id,
        ];
    
        $templateProcessor->setValues($data);
    
        $templateProcessor->saveAs($outputPath);
    
        $relative_path = 'Template/Sub_director/visita/'.$id.'_Visita_subdirector_'.$sub_director_name .'.docx';
    
        return $relative_path;
    
  }

}
