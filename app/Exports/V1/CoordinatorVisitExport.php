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
use App\Models\CoordinatorVisit;

class CoordinatorVisitExport implements  FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected $data;
    protected $model;

    public function __construct($data)
    {
        $this->data = $data;
        $this->model = new CoordinatorVisit();
    }

    public function map($coordinatorVisit): array
    {
        return [
            $coordinatorVisit->id,
            $coordinatorVisit->createdBy->name ?? '',
            $coordinatorVisit->date_visit,
            $coordinatorVisit->hour_visit,
            $coordinatorVisit->monitor->name ?? '',
            $coordinatorVisit->disciplines->name ?? '',
            $coordinatorVisit->municipalities->name ?? '',
            $coordinatorVisit->beneficiary_coverage,
            $coordinatorVisit->statuses->name ?? '',
            $coordinatorVisit->created_at?->format('Y-m-d G:i:s'),
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
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            "COORDINADOR",
            "FECHA",
            "HORA",
            "MONITOR",
            "DISCIPLINA",
            "MUNICIPIO",
            "COBERTURA DEL BENEFICIARIO",
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

        set_time_limit(0);
        ini_set('memory_limit', '6000M');

        $results = $this->model->whereNotIn('created_by', [1,2])
            ->whereHas('createdBy.roles', function($query){
                $query->where('roles.id', config('roles.coordinador_regional'));
            })->get();
        return new CoordinatorVisitCollection($results);
    }
}
