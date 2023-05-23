<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryResource;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Beneficiary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;


class ReportRegistrationFileRepository
{
    private $RegistrationFile;

    function __construct()
    {
        $this->RegistrationFile = new Beneficiary();
    }

    public function generateDoc($id)
    {
        $Beneficiary = $this->RegistrationFile->findOrFail($id);
        $RegistrationFileReport = new BeneficiaryResource($Beneficiary);

        //     return response()->json([$RegistrationFileReport]);

        $templatePath = public_path('Template/metodologo/Registration_File.docx');
        $outputPath = public_path('Template/metodologo/Registration_File_' . $id . '.docx');


        $templateProcessor = new TemplateProcessor($templatePath);

        $data = [
            'id' => $RegistrationFileReport->id,
            'date' => $RegistrationFileReport->registration_date,
            'zone' => $RegistrationFileReport->zone,
            'municipality' => $RegistrationFileReport->municipality->name,
            'name' => $RegistrationFileReport->name,
            'lastname' => $RegistrationFileReport->lastname,
            'city' => $RegistrationFileReport->origin_place,
            'edad' => Carbon::parse($RegistrationFileReport->birth_date)->age,
            'identiti_type' => $RegistrationFileReport->type_document,
            'number_ident' => $RegistrationFileReport->document_number,
            'address' => $RegistrationFileReport->home_address,
            'phone' => $RegistrationFileReport->phone,
            'est' => $RegistrationFileReport->stratum,
            'status' => $RegistrationFileReport->status->name,

            'RU' => $RegistrationFileReport->zone == 'U' ? 'X' : '',
            'UT' => $RegistrationFileReport->zone == 'T' ? 'X' : '',

            'VT' => $RegistrationFileReport->conflict_victim == 1 ? 'X' : ' ',
            'VF' => $RegistrationFileReport->conflict_victim == 0 ? 'X' : '',
            // 'corregimiento'=> $RegistrationFileReport->sidewalk,
            'MT' => $RegistrationFileReport->gender == 'M' ? 'X' : '',
            'FT' => $RegistrationFileReport->gender == 'F' ? 'X' : '',

            'IT' => $RegistrationFileReport->ethnicities_id == '5' ? 'X' : '',
            'AT' => $RegistrationFileReport->ethnicities_id == '1' ? 'X' : '',
            'MT' => $RegistrationFileReport->ethnicities_id == '9' ? 'X' : '',
            'BT' => $RegistrationFileReport->ethnicities_id == '11' ? 'X' : '',
            //'OT' => $RegistrationFileReport->ethnicities_id == '' ? 'X' : '',

            'ST' => $RegistrationFileReport->disability == 1 ? 'X' : ' ',
            'SF' => $RegistrationFileReport->disability == 0 ? 'X' : '',
            //'discapacidad' => $RegistrationFileReport->other_disability,

            'ET' => $RegistrationFileReport->pathology == 1 ? 'X' : '',
            'EF' => $RegistrationFileReport->pathology == 0 ? 'X' : '',
            'patologia' =>  $RegistrationFileReport->what_pathology,
            'TipS' =>  $RegistrationFileReport->blood_type,

            'EST' => $RegistrationFileReport->scholarship == 1 ? 'X' : '',
            'ESF' => $RegistrationFileReport->scholarship == 0 ? 'X' : '',

            'EpT' => $RegistrationFileReport->scholar_level == '1' ? 'X' : '',
            'ESsT' => $RegistrationFileReport->scholar_level == '2' ? 'X' : '',
            'ESgT' => $RegistrationFileReport->scholar_level == '3' ? 'X' : '',
            'institucioneducativa' =>  $RegistrationFileReport->institution,

            'VVp' => $RegistrationFileReport->live_with == '1' ? 'X' : '',
            'VVm' => $RegistrationFileReport->live_with == '2' ? 'X' : '',
            'VVA' => $RegistrationFileReport->live_with == '3' ? 'X' : '',
            'VVH' => $RegistrationFileReport->live_with == '4' ? 'X' : '',
            'VVT' => $RegistrationFileReport->live_with == '5' ? 'X' : '',
            'VVO' => $RegistrationFileReport->live_with == '6' ? 'X' : '',
            // 'VV-personadiferente' =>  $RegistrationFileReport->

            //  'health-entity' => $RegistrationFileReport->health_entity->name,

            'HS' => $RegistrationFileReport->affiliation_type == 'SUB' ? 'X' : '',
            'HC' => $RegistrationFileReport->affiliation_type == 'CON' ? 'X' : '',
            'HN' => $RegistrationFileReport->affiliation_type == 'NA' ? 'X' : '',

            'como_se_dio_cuenta' => $RegistrationFileReport->acudientes[0]->find_out,
            'Nombre_acudiente' => $RegistrationFileReport->acudientes[0]->guardian->full_name,
            'numero_acudiente' => $RegistrationFileReport->acudientes[0]->guardian->cedula,
            'parentezco_acudiente' => $RegistrationFileReport->acudientes[0]->relationship,
            'email_acudiente' => $RegistrationFileReport->acudientes[0]->guardian->email,
            'celular_acudiente' => $RegistrationFileReport->acudientes[0]->guardian->phone_number,
            'red_social_acudiente' => $RegistrationFileReport->acudientes[0]->social_media,

            //  'monitor' => $RegistrationFileReport->monitor->name,
            //'disciplines' => $RegistrationFileReport->disciplines->name,
        ];

        // return response()->json([$data]);

        $templateProcessor->setValues($data);

        try {
            $templateProcessor->setImageValue('imagen', array('path' => storage_path("app/public/" . $RegistrationFileReport->file), 'width' => 500, 'height' => 500, 'ratio' => false));
        } catch (\Exception $e) {
        }


        $templateProcessor->saveAs($outputPath);

        $relative_path = 'Template/metodologo/Registration_File_' . $id . '.docx';
        return $relative_path;
    }
}
