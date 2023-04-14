<?php

namespace App\Exports\V1;

use App\Http\Resources\V1\TransversalActivityCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Http\Resources\V1\UserCollection;
use App\Models\TransversalActivity;
use App\Traits\FunctionGeneralTrait;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransversalActivityExport implements  FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected $data;
    protected $model;

    public function __construct($data)
    {
        $this->data = $data;
        $this->model = new TransversalActivity();
    }

    public function map($transversalActivity): array
    {
        return [
            $transversalActivity->id,
            $transversalActivity->creator->name ?? '',
            $transversalActivity->municipalities->name ?? '',
            $transversalActivity->activity_name,
            $transversalActivity->date_visit,
            $transversalActivity->objective_activity,
            $transversalActivity->scene,
            $transversalActivity->nro_assistants,
            $transversalActivity->created_at?->format('Y-m-d G:i:s'),
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
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            "PSICÓLOGO",
            "MUNICIPIO",
            "ACTIVIDAD",
            "FECHA",
            "OBJETIVO",
            "ESCENARIO",
            "NUMERO DE ASISTENTES",
            'FECHA SUBIDA',
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
        $transversalActivities = $this->model->whereNotIn('created_by', [1,2])->get();
        return new TransversalActivityCollection($transversalActivities);
    }
}
