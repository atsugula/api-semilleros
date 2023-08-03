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
use App\Models\User;
use App\Models\CoordinatorVisit;
use App\Models\Chronogram;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;
use PhpParser\Node\Stmt\TryCatch;

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
    $this->user = new User();
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

      $bene_name = str_replace(' ', '_', $ChronogramReport->creator->lastname);

      $relative_path = 'Template\Chronogram\fichas\chronogram_'.$id.'_por_'. $bene_name .'.docx';

      $templatePath = public_path('Template/Chronogram/template/Template.docx');
      $outputPath = public_path($relative_path);

       $templateProcessor = new TemplateProcessor($templatePath);

       $data = [
        'update_date' => $ChronogramReport->updated_at,
        'status' => $ChronogramReport->statuses->name,
        'MONTH' => $ChronogramReport->mes->name,
        'MONITOR_name' => $ChronogramReport->creator->name,
        'MONITOR_lastname' => $ChronogramReport->creator->lastname,
        'zone' => $ChronogramReport->municipio->zone_id,
        'municipio' => $ChronogramReport->municipio->name,
        'observaciones' => $ChronogramReport->note,
       ];
       $index = 1;
       foreach($ChronogramReport->groups as $group){
        $gruopID = 'idG'.$index;
        $discipline = 'modDep' . $index;
        $nombre_Esc_Principal = 'GNEDP' . $index;
        $direccion_Esc_Principal = 'GDEDP' . $index;
        $nombre_Esc_Alterno = 'GNEDA' . $index;
        $direccion_Esc_Alterno = 'GDEDA' . $index;
        $templateProcessor->setValue($gruopID, $group->group_id);
        $templateProcessor->setValue($discipline, $group->discipline->name);
        $templateProcessor->setValue($nombre_Esc_Principal, $group->main_sports_stage_name);
        $templateProcessor->setValue($direccion_Esc_Principal, $group->main_sports_stage_address);
        $templateProcessor->setValue($nombre_Esc_Alterno, $group->alt_sports_stage_name);
        $templateProcessor->setValue($direccion_Esc_Alterno, $group->alt_sports_stage_address);
        $IndexHorario = 1;
        foreach($group->schedules as $horario){
          $dayScript = 'G'.$index.'D'.$IndexHorario;
          $hourIScript = 'G'.$index.'D'.$IndexHorario.'HI';
          $hourTScript = 'G'.$index.'D'.$IndexHorario.'HT';
          $IndexHorario++;

          $templateProcessor->setValue($dayScript, $horario->day);
          $templateProcessor->setValue($hourIScript, $horario->start_time);
          $templateProcessor->setValue($hourTScript, $horario->end_time);
        }

        if ($IndexHorario < 6 ){
          for($i = $IndexHorario; $i <= 6; $i++){
            $dayScript = 'G'.$index.'D'.$i;
            $hourIScript = 'G'.$index.'D'.$i.'HI';
            $hourTScript = 'G'.$index.'D'.$i.'HT';
            $templateProcessor->setValue($dayScript, '');
            $templateProcessor->setValue($hourIScript, '');
            $templateProcessor->setValue($hourTScript, '');
          }
        }

        $index++;
      }
      //limpiar informacion
      if($index < 6){
        for($i = $index; $i <= 5; $i++){
          $gruopID = 'idG' . $i;
          $discipline = 'modDep' . $i;
          $nombre_Esc_Principal = 'GNEDP' .$i;
          $direccion_Esc_Principal = 'GDEDP' .$i;
          $nombre_Esc_Alterno = 'GNEDA' .$i;
          $direccion_Esc_Alterno = 'GDEDA' .$i;
          $templateProcessor->setValue($gruopID, '');
          $templateProcessor->setValue($discipline, '');
          $templateProcessor->setValue($nombre_Esc_Principal, '');
          $templateProcessor->setValue($direccion_Esc_Principal, '');
          $templateProcessor->setValue($nombre_Esc_Alterno, '');
          $templateProcessor->setValue($direccion_Esc_Alterno, '');

          for ($j = 1; $j <= 6; $j++) {
            $dayScript = 'G' . $i . 'D' . $j;
            $hourIScript = 'G' . $i . 'D' . $j . 'HI';
            $hourTScript = 'G' . $i . 'D' . $j . 'HT';

            $templateProcessor->setValue($dayScript, '');
            $templateProcessor->setValue($hourIScript, '');
            $templateProcessor->setValue($hourTScript, '');
        }
        }


      }

       $templateProcessor->setValues($data);

       $templateProcessor->saveAs($outputPath);

      return $relative_path;

    } catch (Exception $e) {
      return $e;
    }


  }

  public function GenerateBenefisiaries($id) {

    try {

      $BeneficiariesReport = $this->beneficiaries->findOrFail($id);
    if ($BeneficiariesReport->status_id == 1) {
      try {
        $networks = str_replace(['[', '"', ']'], '', $BeneficiariesReport->acudientes[0]->social_media);
        $find_out = str_replace(['[', '"', ']'], '', $BeneficiariesReport->acudientes[0]->find_out);
      } catch (\Throwable $th) {
        $networks = "";
        $find_out = "";
      }




      $bene_name = str_replace(' ', '_', $BeneficiariesReport->full_name);

       //ruta de la plantilla
       $templatePath = public_path('Template/Benefisiaries/Ficha/ficha.docx');
       $outputPath = public_path('Template/Benefisiaries/fichas/Ficha_'.$id.'_beneficiario_'. $bene_name .'.docx');

      //formatear fecha
      if($BeneficiariesReport->birth_date != null){
      $birth_date_parts = explode('-', $BeneficiariesReport->birth_date);
      $birth_year = $birth_date_parts[0];
      $birth_month = $birth_date_parts[1];
      $birth_day = $birth_date_parts[2];
      }else{
        $birth_year = '';
        $birth_month = '';
        $birth_day = '';
      }
      $templateProcessor = new TemplateProcessor($templatePath);

      $data = [
        "id" => $BeneficiariesReport->id,
        "date" => Carbon::createFromFormat('Y-m-d', $BeneficiariesReport->registration_date)->isoFormat('D [de] MMMM [de] YYYY'),
        "zone" => $BeneficiariesReport->municipality->zone_id ? : 'no ingresado',
        "municipality" => $BeneficiariesReport->municipality->name,
        "full_name" => $BeneficiariesReport->full_name,
        "BD" => $birth_day,
        "BM" => $birth_month,
        "BY" => $birth_year,
        "city" => $BeneficiariesReport->origin_place,
        "identiti_type" => $BeneficiariesReport->type_document == "TI" ? "Tarjeta de identidad" :
        ($BeneficiariesReport->type_document == "CC" ? "Cedula de ciudadania" :
        ($BeneficiariesReport->type_document == "NIT" ? "Número de Identificación Tributaria" :
        ($BeneficiariesReport->type_document == "PEP" ? "Permiso Especial de Permanencia": "NO REGISTRADA"))),
        "number_ident" => $BeneficiariesReport->document_number,
        "addres" => $BeneficiariesReport->home_address,
        "phone" => $BeneficiariesReport->phone,
        "est" => $BeneficiariesReport->stratum,
        "corregimiento" => $BeneficiariesReport->distric == "" ? "N/A" : $BeneficiariesReport->distric,
        "institucioneducativa" => $BeneficiariesReport->institution,
        "live_with" => implode(', ', json_decode($BeneficiariesReport->live_with, true)),
        "health-entity" => $BeneficiariesReport->health_entity->entity,
        "monitor" => $BeneficiariesReport->created_user->name . ' ' . $BeneficiariesReport->created_user->lastname,
        "deporte" => $BeneficiariesReport->created_user->disciplines[0]->disciplines[0]->name,
        //tipos de sange
        "TipS" => $BeneficiariesReport->blood_type == 1 ? "A+" :
        ($BeneficiariesReport->blood_type == 2 ? "A-" :
        ($BeneficiariesReport->blood_type == 3 ? "B+" :
        ($BeneficiariesReport->blood_type == 4 ? "B-" :
        ($BeneficiariesReport->blood_type == 5 ? "AB+" :
        ($BeneficiariesReport->blood_type == 6 ? "O+" :
        ($BeneficiariesReport->blood_type == 7 ? "O-" : "")))))),
        //zona
        "RU" => $BeneficiariesReport->zone == 'R' ? "X" : "",
        "UT" => $BeneficiariesReport->zone == 'U' ? "X" : "",
        //victma de conflicto
        "VT" => $BeneficiariesReport->conflict_victim == 1 ? "X" : "",
        "VF" => $BeneficiariesReport->conflict_victim == 0 ? "X" : "",
        //genero
        "FT" => $BeneficiariesReport->gender == 'F' ? "X" : "",
        "MT" => $BeneficiariesReport->gender == 'M' ? "X" : "",
        //etnias
        "A-T" => $BeneficiariesReport->ethnicities_id == 1 ? "X" : "",
        "M-T" => $BeneficiariesReport->ethnicities_id == 9 ? "X" : "",
        "B-T" => $BeneficiariesReport->ethnicities_id == 11 ? "X" : "",
        "O-T" => $BeneficiariesReport->ethnicities_id == 12 ? "X" : "",
        "I-T" => $BeneficiariesReport->ethnicities_id == 5 ? "X" : "",
        "OTHER_ET" => $BeneficiariesReport->ethnicities_id == 12 ? $BeneficiariesReport->ethnicities_id->name : "",
        //discapacidad
        "S-T" => $BeneficiariesReport->disability == 1 ? "X" : "",
        "S-F" => $BeneficiariesReport->disability == 0 ? "X" : "",
        "discapacidad" => $BeneficiariesReport->other_disability == null ? '':$BeneficiariesReport->other_disability,
        //patologia
        "E-T" => $BeneficiariesReport->pathology == 1 ? "X" : "",
        "E-F" => $BeneficiariesReport->pathology == 1 ? "" : "X",
        "patologia" => $BeneficiariesReport->what_pathology == null ? '':$BeneficiariesReport->what_pathology,
        //ecolaridad
        "ES-T" => $BeneficiariesReport->scholarship == 1 ? "X" : "",
        "ES-F" => $BeneficiariesReport->scholarship == 0 ? "X" : "",
        //escolaridad Level
        "EP-T" => $BeneficiariesReport->scholar_level == 1 ? "X" : "",
        "ESS-T" => $BeneficiariesReport->scholar_level == 2 ? "X" : "",
        "ESG-T" => $BeneficiariesReport->scholar_level == 3 ? "X" : "",
        //Tipo de afiliacion
        "H-S" => $BeneficiariesReport->affiliation_type == "SUB" ? "X" : "",
        "H-C" => $BeneficiariesReport->affiliation_type == "CON" ? "X" : "",
        "H-N" => $BeneficiariesReport->affiliation_type == "NA" ? "X" : "",

        // acudientes
        "acudiente" => $BeneficiariesReport->acudientes[0]->guardian->firts_name . ' ' . $BeneficiariesReport->acudientes[0]->guardian->last_name,
        "parentesco" => $BeneficiariesReport->acudientes[0]->relationship,
        "num" => $BeneficiariesReport->acudientes[0]->guardian->cedula,
        "tel" => $BeneficiariesReport->acudientes[0]->guardian->phone_number,
        "emailG" => $BeneficiariesReport->acudientes[0]->guardian->email,
        "networks" => $networks ,
        "find_out" => $find_out ,


      ];

      $templateProcessor->setValues($data);

      $templateProcessor->saveAs($outputPath);

      $relative_path = 'Template/Benefisiaries/fichas/Ficha_'.$id.'_beneficiario_'. $bene_name .'.docx';

      return  $relative_path;
      //return $BeneficiariesReport->acudientes[0]->guardian->firts_name;
    }else{
      $e = "El beneficiario no esta aprobado";
      return $e;
    }

    } catch (Exception $e) {
      return $e;
    }


  }

}
