<?php

namespace App\Exports\V1;

use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\VisitSubDirectorCollection;
use App\Models\User;
use App\Models\VisitSubDirector;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class VisitSubDirectorExport implements  FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected $data;
    protected $model;

    public function __construct($data)
    {
        $this->data = $data;
        $this->model = new VisitSubDirector();
    }

    public function map($visitSubDirector): array
    {
        return [
            $visitSubDirector->id,
            $visitSubDirector->name,
            $visitSubDirector->lastname,
            $visitSubDirector->document_number,
            $visitSubDirector->gender,
            $visitSubDirector->created_at?->format('Y-m-d G:i:s'),
        ];
    }
    //
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 37,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 30,
            'I' => 50,
            'J' => 20,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            "SUBDIRECTOR",
            "FECHA",
            "HORA",
            "MUNICIPIO",
            "ESCENARIO DEPORTIVO",
            "MONITOR",
            "DISCIPLINA",
            "APOYA EL EVENTO",
            "EVENTO",
            "COBERTURA DEL BENEFICIARIO",
            "CUMPLE CON EL DESARROLLO DEL COMPONENTE TECNICO DEL MES",
            "ESTADO",
            'FECHA SUBIDA',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:J1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial Narrow')->setSize(11); // Letra primera fila
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(True); // Negrita primera fila
                $event->sheet->getStyle('A:J')->getAlignment()->setHorizontal('center');
                // $event->sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $event->sheet->setAutoFilter('A:J');
            },
        ];
    }

    public function collection()
    {
        $results = $this->model->whereNotIn('created_by', [1,2])
            ->whereHas('creator.roles', function($query){
                $query->where('roles.id', config('roles.subdirector_tecnico'));
            })->get();
        return new VisitSubDirectorCollection($results);
    }
}
