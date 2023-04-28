<?php

namespace App\Exports\V1;

use App\Http\Resources\V1\CoordinatorVisitCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Traits\FunctionGeneralTrait;
use App\Models\Beneficiary;

class InscriptionExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected $data;
    protected $model;

    public function __construct($data)
    {
        $this->data = $data;
        $this->model = new Beneficiary();
    }

    public function map($customVisit): array
    {
        return [
            $customVisit->id,
            $customVisit->created_user->name ?? '',
            $customVisit->created_user->document_number ?? '',
            $customVisit->created_at?->format('Y-m-d G:i:s'),
            $customVisit->municipalities->name ?? '',
            $customVisit->statuses->name ?? '',
        ];
    }
    //
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            "NOMBRE MONITOR",
            "CEDULA MONITOR",
            "FECHA DE CREACIÓN",
            "MUNICIPIO",
            "REGIÓN",
            "DISCIPLINAS",
            "NOMBRES Y APELLIDOS",
            "FECHA DE NACIMIENTO",
            "LUGAR DE NACIMIENTO",
            "EDAD",
            "TIPO DE IDENTIFICACIÓN",
            "# IDENTIFICACIÓN",
            "DIRECCIÓN",
            "# TELÉFONO/CELULAR",
            "ESTRATO",
            "ZONA",
            "VÍCTIMA DE CONFLICTO",
            "CORREGIMIENTO/BARRIO/VEREDA",
            "GENERO",
            "ETNIA",
            "DISCAPACIDAD",
            "TIPO DE DISCAPACIDAD",
            "PATOLOGÍA",
            "TIPO DE PATOLOGÍA",
            "RH",
            "ESCOLARIDAD",
            "NIVEL ESCOLARIDAD",
            "INSTITUCIÓN",
            "VIVE",
            "EPS",
            "TIPO AFILIACIÓN",
            "NOMBRES Y APELLIDOS(ACUDIENTE)",
            "# CEDULA",
            "PARENTESCO",
            "EMAIL",
            "CELULAR",
            "REDES SOCIALES",
            "CONOCIMIENTO DEL PROYECTO",
            "ESTADO",
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial Narrow')->setSize(11); // Letra primera fila
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(True); // Negrita primera fila
                $event->sheet->getStyle('A:I')->getAlignment()->setHorizontal('center');
                // $event->sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $event->sheet->setAutoFilter('A:I');
            },
        ];
    }

    public function collection()
    {

        set_time_limit(0);
        ini_set('memory_limit', '6000M');

        $results = $this->model->whereNotIn('created_by', [1,2])
            ->whereHas('createdBy.roles', function($query){
                $query->where('roles.id', config('roles.psicologo'));
            })->get();
        return new CoordinatorVisitCollection($results);
    }
}
