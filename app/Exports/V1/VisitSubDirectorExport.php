<?php

namespace App\Exports\V1;

use App\Http\Resources\V1\VisitSubDirectorCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Traits\FunctionGeneralTrait;
use App\Models\VisitSubDirector;

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
            $visitSubDirector->creator->name ?? '',
            $visitSubDirector->date_visit,
            $visitSubDirector->hour_visit,
            $visitSubDirector->municipalities->name ?? '',
            $visitSubDirector->sports_scene,
            $visitSubDirector->monitor->name ?? '',
            $visitSubDirector->disciplines->name ?? '',
            $visitSubDirector->event_support == 1 ? 'SI' : 'NO',
            $visitSubDirector->description,
            $visitSubDirector->beneficiary_coverage,
            $visitSubDirector->technical == 1 ? 'SI' : 'NO',
            $visitSubDirector->statuses->name ?? '',
            $visitSubDirector->created_at?->format('Y-m-d G:i:s'),
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
            'J' => 20,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 20,
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
                $cellRange = 'A1:N1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial Narrow')->setSize(11); // Letra primera fila
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(True); // Negrita primera fila
                $event->sheet->getStyle('A:N')->getAlignment()->setHorizontal('center');
                // $event->sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $event->sheet->setAutoFilter('A:N');
            },
        ];
    }

    public function collection()
    {

        set_time_limit(0);
        ini_set('memory_limit', '6000M');

        $results = $this->model->whereNotIn('created_by', [1,2])
            ->whereHas('creator.roles', function($query){
                $query->where('roles.id', config('roles.subdirector_tecnico'));
            })->get();
        return new VisitSubDirectorCollection($results);
    }
}
