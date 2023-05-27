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

    public function __construct()
    {
        $this->cronogram = new Chronogram();
    }

    public function generateDoc($id)
    {
        $ChronogramReport = $this->cronogram->findOrFail($id);
        $grupo = $ChronogramReport->load('groups');

        $templatePath = public_path('Template/Chronogram/template.docx');
        $outputPath = public_path('Template/Chronogram/template/Chronograma_' . $id . '.docx');

        $templateProcessor = new TemplateProcessor($templatePath);

        $data = [
            'update_date' => $grupo->updated_at,
            'MONTH' => $grupo->mes->name,
            'MONITOR_name' => $grupo->creator->name,
            'MONITOR_lastname' => $grupo->creator->lastname,
            'zone' => $grupo->zone->name,
            'municipio' => $grupo->municipio->name,
        ];

        $templateProcessor->setValues($data);

        try {
            $templateProcessor->setImageValue('imagen', [
                'path' => storage_path("app/public/" . $ChronogramReport->file),
                'width' => 500,
                'height' => 500,
                'ratio' => false,
            ]);
        } catch (\Exception $e) {
        }

        // Exportar información de los grupos
        $groupsData = '';
        foreach ($grupo->groups as $group) {
            $groupsData .= "ID: " . $group->id . "\n";
            $groupsData .= "Sports Modality: " . $group->sports_modality . "\n";
            $groupsData .= "Main Sports Stage Name: " . $group->main_sports_stage_name . "\n";
            $groupsData .= "Main Sports Stage Address: " . $group->main_sports_stage_address . "\n";
            $groupsData .= "Alternative Sports Stage Name: " . $group->alt_sports_stage_name . "\n";
            $groupsData .= "Alternative Sports Stage Address: " . $group->alt_sports_stage_address . "\n";
            $groupsData .= "Schedules: \n";
            foreach ($group->schedules as $schedule) {
                $groupsData .= "- Day: " . $schedule->day . ", Start Time: " . $schedule->start_time . ", End Time: " . $schedule->end_time . "\n";
            }
            $groupsData .= "\n";
        }
        $templateProcessor->setValue('groups_data', $groupsData);

        $templateProcessor->saveAs($outputPath);

        $relativePath = 'Template/Chronogram/template/Chronograma_' . $id . '.docx';
        return $relativePath;
    }
}

