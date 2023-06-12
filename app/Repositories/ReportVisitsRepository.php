<?php
namespace App\Repositories;

use App\Http\Resources\V1\ChronogramResource;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\MethodologistVisit;
use App\Models\VisitSubDirector;
use App\Models\TransversalActivity;
use App\Models\CustomVisit;
use App\Models\HealthEntities;
use App\Models\psychologistVisits;
use App\Models\KnowGuardians;
use App\Models\BeneficiaryGuardians;
use App\Models\Beneficiary;
use App\Models\user;
use App\Models\CoordinatorVisit;
use App\Models\Chronogram;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;


class ReportVisitsRepository
{ 
  private $MethodologistVisit;
  private $psychologistVisit;
  private $visitSubDirector;
  private $PsychologisttransversalActivity;
  private $PsychologistcustomVisit;
  private $HealthEntities;
  private $beneficiaries;
  private $KnowGuardians;
  private $BeneficiaryGuardians;
  private $user;
  private $CoordinatorVisit;
  private $Chronogram;

  function __construct()
  {
    $this->CoordinatorVisit = new CoordinatorVisit();
    $this->MethodologistVisit = new MethodologistVisit();
    $this->psychologistVisit = new psychologistVisits();
    $this->visitSubDirector = new VisitSubDirector();
    $this->PsychologisttransversalActivity = new TransversalActivity();
    $this->PsychologistcustomVisit = new CustomVisit();
    $this->HealthEntities = new HealthEntities();
    $this->KnowGuardians = new KnowGuardians();
    $this->BeneficiaryGuardians = new BeneficiaryGuardians();
    $this->Chronogram = new Chronogram();
    $this->user = new user();
    $this->beneficiaries = new Beneficiary();
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
        "obj.activity" => $psychologistVisitReport->objetive,
        "BNT" => $psychologistVisitReport->beneficiaries_recognize_name ==true ? 'X' :' ',
        "BNF" => $psychologistVisitReport->beneficiaries_recognize_name ==false ? 'X' :' ',
        "BDT" => $psychologistVisitReport->beneficiary_recognize_value =='true' ? 'X' :' ',
        "BDF" => $psychologistVisitReport->beneficiary_recognize_value =='false' ? 'X' :' ',
        "all_ok" => $psychologistVisitReport->all_ok =='true' ? 'X' :' ',
        "all_not_ok" => $psychologistVisitReport->all_ok =='false' ? 'X' :' ',
        "descripcion" => $psychologistVisitReport->description,
        "observaciones" => $psychologistVisitReport->observations,
      ];

      $templateProcessor->setValues($data);

      try {
        $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/".$psychologistVisitReport->file), 'width' => 500, 'height' => 500, 'ratio' => false));
      } catch (\Exception $e) {
      }

      $templateProcessor->saveAs($outputPath);

      $relative_path = 'Template/psicosocial/visitas/'.$id.'_Visita_psicologica_'.$Psycologic_name.'.docx';

      return $relative_path;


  }

  public function GenerateDocPsychologistcustomVisit($id){

    $psychologistCustomVisitReport = $this->PsychologistcustomVisit->findOrFail($id);

    $EPS = $this->HealthEntities->findOrFail($psychologistCustomVisitReport->beneficiaries->health_entity_id);

    $relation_guardian = $psychologistCustomVisitReport->beneficiaries->acudientes[0]->id_guardian;

    $acudientes = $this->BeneficiaryGuardians->findOrFail($relation_guardian);

    $metodologo = $this->user->findOrFail($psychologistCustomVisitReport->beneficiaries->created_by);


    $Psycologic_name = str_replace(' ', '_', $psychologistCustomVisitReport->createdBY->name);
    
    $templatePath = public_path('Template/psicosocial/Psicosocialvisitaspersonalizadas/plantilla.docx');
    $outputPath = public_path('Template/psicosocial/Psicosocialvisitaspersonalizadas/'.$id.'_Visita_personalizada_psicologica_'.$Psycologic_name.'.docx');

    $templateProcessor = new TemplateProcessor($templatePath);

    $data = [
      "region" => $psychologistCustomVisitReport->municipalities->zone_id,
      "municipalitie" => $psychologistCustomVisitReport->municipalities->name,
      "month" => $psychologistCustomVisitReport->months->name,
      "beneficiary_name" => $psychologistCustomVisitReport->beneficiaries->full_name,
      //"benefeciarie_grade" => $psychologistCustomVisitReport->beneficiaries->scholar_level == 1 ? 'Primaria' : 'Bachillerato',
      "EPS" => $EPS->entity,
      "ac_name" => $acudientes->firts_name,
      "ac_lastname" => $acudientes->last_name,
      "AC_DOC" => $acudientes->cedula,
      "knT" => 'X',
      "knF" => ' ',
      "monitor_name" => $metodologo->name,
      "monitor_lastname" => $metodologo->lastname,
      "theme" => $psychologistCustomVisitReport->theme,
      "agreements" => $psychologistCustomVisitReport->agreements,
      "concept" => $psychologistCustomVisitReport->concept,

      ];
      $beneficiaryGrade = $psychologistCustomVisitReport->beneficiaries->scholar_level;
      if ($beneficiaryGrade == 1) {
          $data["benefeciarie_grade"] = "Primaria";
      } elseif ($beneficiaryGrade == 2) {
          $data["benefeciarie_grade"] = "Bachillerato";
      } elseif ($beneficiaryGrade == 3) {
          $data["benefeciarie_grade"] = "Graduado";
      }
      

      
    $templateProcessor->setValues($data);

    try {
      $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/".$psychologistCustomVisitReport->file), 'width' => 400, 'height' => 400, 'ratio' => false));
    } catch (\Exception $e) {
    }

    $templateProcessor->saveAs($outputPath);

    $relative_path = 'Template/psicosocial/Psicosocialvisitaspersonalizadas/'.$id.'_Visita_personalizada_psicologica_'.$Psycologic_name.'.docx';

   return $relative_path;
   //return $psychologistCustomVisitReport;
  }

  Public function GeneratedocPsychologisttransversalActivity($id){
      
      $psychologistTransversalActivity = $this->PsychologisttransversalActivity->findOrFail($id);
  
      $Psycologic_name = str_replace(' ', '_', $psychologistTransversalActivity->creator->name);
      
      $templatePath = public_path('Template/psicosocial/actividades-transversales/plantilla.docx');
      $outputPath = public_path('Template/psicosocial/actividades-transversales/'.$id.'_Actividad_transversal_psicologica_'.$Psycologic_name.'.docx');
  
      $templateProcessor = new TemplateProcessor($templatePath);
  
      $data = [
        "region" => $psychologistTransversalActivity->municipalities->zone_id,
        "date_visit" => $psychologistTransversalActivity->date_visit,
        "municipitie_name" => $psychologistTransversalActivity->municipalities->name,
        "psi_name" => $psychologistTransversalActivity->creator->name,
        "psi_lastname" => $psychologistTransversalActivity->creator->lastname,
        "activity_name" => $psychologistTransversalActivity->activity_name,
        "objective_activity" => $psychologistTransversalActivity->objective_activity,
        "nro_assistants" => $psychologistTransversalActivity->nro_assistants,
        "scene" => $psychologistTransversalActivity->scene,
        "meeting_planing" => $psychologistTransversalActivity->meeting_planing,
        "team_socialization" => $psychologistTransversalActivity->team_socialization,
        "development_activity" => $psychologistTransversalActivity->development_activity,
        "content_network" => $psychologistTransversalActivity->content_network

      ];

      //  $files = $psychologistTransversalActivity->files;
      //  $totalImages = count($files);
      //  $maxImages = 4; // Número máximo de imágenes
      //  for ($i = 0; $i < $totalImages; $i++) {
      //    try {
      //      $imagePath = $files[$i]['path'];
      //      $templateProcessor->setImageValue('imagen' . ($i + 1), array('path' => storage_path("app/public/".$imagePath), 'width' => 400, 'height' => 400, 'ratio' => false));
      //    }catch (\Exception $e) {
      //      return $e;
      //    } 
      //  }

       $files = $psychologistTransversalActivity->files;
       $totalImages = count($files);
       $maxImages = 4; // Número máximo de imágenes
       for ($i = 0; $i < $maxImages; $i++) {
        
         try {
            if($i < $totalImages){
              $imagePath = $files[$i]['path'];
              $templateProcessor->setImageValue('imagen' . ($i + 1), array('path' => storage_path("app/public/".$imagePath), 'width' => 400, 'height' => 400, 'ratio' => false));
            }else{
              $templateProcessor->setValue('imagen' . ($i + 1), ''); // Asignar el valor "" a las variables restantes
          }           
          }catch (\Exception $e) {
           return $e;
         } 
       }

      // $files = $psychologistTransversalActivity->files;
      // $maxImages = 4; // Número máximo de imágenes
      // for ($i = 0; $i < $maxImages; $i++) {
      //     if ($i < count($files)) {
      //         try {
      //           $imagePath = $files[$i]['path'];
      //           $templateProcessor->setImageValue('imagen' . ($i + 1), array('path' => storage_path("app/public/".$imagePath), 'width' => 400, 'height' => 400, 'ratio' => false));
      //         } catch (\Exception $e) {
      //             return $e;
      //         }
      //     } else {
      //         $templateProcessor->setValue('imagen' . ($i + 1), ''); // Asignar el valor "" a las variables restantes
      //     }
      // }
      
  
      $templateProcessor->setValues($data);
  
      $templateProcessor->saveAs($outputPath);


  
      $relative_path = 'Template/psicosocial/actividades-transversales/'.$id.'_Actividad_transversal_psicologica_'.$Psycologic_name.'.docx';
  
      return $relative_path ;
      ;
  
  }

  Public function GeneratedocvisitSubDirector($id){
        
        $visitSubDirector = $this->visitSubDirector->findOrFail($id);
    
        $sub_director_name = str_replace(' ', '_', $visitSubDirector->creator->name);
        
        $templatePath = public_path('Template/Sub_director/visita/plantilla.docx');
        $outputPath = public_path('Template/Sub_director/visita/'.$id.'_Visita_subdirector_'.$sub_director_name .'.docx');
    
        $templateProcessor = new TemplateProcessor($templatePath);
    
        $data = [
          "region" => $visitSubDirector->municipalities->zone_id,
          "creator_name" => $visitSubDirector->creator->name,
          "creator_lastname" => $visitSubDirector->creator->lastname,
          "date_visit" => $visitSubDirector->date_visit,
          "hour_visit" => $visitSubDirector->hour_visit,
          "municipitie_name" => $visitSubDirector->municipalities->name,
          "sidewalk" => $visitSubDirector->sidewalk,
          "monitor_name" => $visitSubDirector->monitor->name,
          "monitor_lastname" => $visitSubDirector->monitor->lastname,
          "discipline" => $visitSubDirector->disciplines->name,
          "sport_scenary" => $visitSubDirector->sports_scene,
          "evt" => $visitSubDirector->event_support == 1 ? 'X' : ' ',
          "evf" => $visitSubDirector->event_support == 0 ? 'X' : ' ',
          "beneficiary_coverage" => $visitSubDirector->beneficiary_coverage,
          "technical" => $visitSubDirector->technical == 1 ? 'SI' : 'NO',
          "observations" => $visitSubDirector->observations,
          "description" => $visitSubDirector->description,

        ];
    
        $templateProcessor->setValues($data);

        try {
          $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/".$visitSubDirector->file), 'width' => 400, 'height' => 400, 'ratio' => false));
        } catch (\Exception $e) {
        }
    
        $templateProcessor->saveAs($outputPath);
    
        $relative_path = 'Template/Sub_director/visita/'.$id.'_Visita_subdirector_'.$sub_director_name .'.docx';
    
        return $relative_path ;
    
  }

  public function GenerateDocVisitCoordinador($id){
    // buscar la visita
    $visit = $this->CoordinatorVisit->findOrFail($id);

    $coordinador_name = str_replace(' ', '_', $visit->createdBy->name);

    //ruta de la plantilla
    $templatePath = public_path('Template/Regional_coordinator/visita/plantilla.docx');
    $outputPath = public_path('Template/Regional_coordinator/visita/'.$id.'_Visita_subdirector_'. $coordinador_name .'.docx');

    $templateProcessor = new TemplateProcessor($templatePath);


    $data = [
      "name" => $visit->createdBy->name,
      "last_name" => $visit->createdBy->lastname,
      "date" => $visit->date_visit,
      "hour" => $visit->hour_visit,
      "monitor_name" => $visit->monitor->name,
      "monitor_lastname" => $visit->monitor->lastname,
      "disciplines" => $visit->disciplines->name,
      "scenaris" => $visit->sports_scene,
      "region" => $visit->municipalities->zone_id,
      "municipie" => $visit->municipalities->name,
      "Corrigimiento" => $visit->sidewalk,
      "Num_beneficiarie" => $visit->beneficiary_coverage,
      "descripcion" => $visit->description,
      "observaciones" => $visit->observations,
    ];

    $templateProcessor->setValues($data);

    try {
      $templateProcessor->setImageValue('image', array('path' => storage_path("app/public/".$visit->file), 'width' => 400, 'height' => 400, 'ratio' => false));
    } catch (\Exception $e) {
      $data2 = [
        "image" => '',
      ];
      $templateProcessor->setValues($data2);
    }


    $templateProcessor->saveAs($outputPath);

    $relative_path = 'Template/Regional_coordinator/visita/'.$id.'_Visita_subdirector_'. $coordinador_name .'.docx';

    return $relative_path;
  }

  public function GenerateChronogram($id) {

    try {
      $ChronogramReport = $this->Chronogram->findOrFail($id);


  
      $templatePath = public_path('Template/Chronogram/Template');
        
        
      return $ChronogramReport;

    } catch (Exception $e) {
      Log::info($e);
    }
        

  }

  public function GenerateBenefisiaries($id) {

    try {

      $BeneficiariesReport = $this->beneficiaries->findOrFail($id);

      $bene_name = str_replace(' ', '_', $BeneficiariesReport->full_name);

      //ruta de la plantilla
      $templatePath = public_path('Template/Benefisiaries/Ficha/ficha.docx');
      $outputPath = public_path('Template/Benefisiaries/fichas/Ficha_'.$id.'_beneficiario_'. $bene_name .'.docx');

      //formatear fecha
      $birth_date_parts = explode('-', $BeneficiariesReport->birth_date);
      $birth_year = $birth_date_parts[0];
      $birth_month = $birth_date_parts[1];
      $birth_day = $birth_date_parts[2];

      $templateProcessor = new TemplateProcessor($templatePath);

      $data = [
        "id" => $BeneficiariesReport->id,
        "date" => $BeneficiariesReport->registration_date,
        "zone" => $BeneficiariesReport->municipality->zone_id,
        "municipality" => $BeneficiariesReport->municipality->name,
        "full_name" => $BeneficiariesReport->full_name,
        "BD" => $birth_day,
        "BM" => $birth_month,
        "BY" => $birth_year,
      ];

      $templateProcessor->setValues($data);

      $templateProcessor->saveAs($outputPath);

      $relative_path = 'Template/Benefisiaries/fichas/Ficha_'.$id.'_beneficiari_'. $bene_name .'.docx';

      return  $BeneficiariesReport->municipality->zone_id;

    } catch (Exception $e) {
      return $e;
    }
        

  }

}
