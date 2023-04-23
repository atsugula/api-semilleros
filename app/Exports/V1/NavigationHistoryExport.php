<?php

namespace App\Exports\V1;

use App\Http\Resources\V1\NavigationHistoryCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Support\Facades\DB;

class NavigationHistoryExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected  $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function map($navigation_history): array
    {
        return [
            $navigation_history->id,
            $navigation_history->url,
            $navigation_history->name . $navigation_history->lastname,
            $navigation_history->created_at,
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
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            "URL",
            "NOMBRE",
            'FECHA SUBIDA',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial Narrow')->setSize(11); // Letra primera fila
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(True); // Negrita primera fila
                $event->sheet->getStyle('A:D')->getAlignment()->setHorizontal('center');
                // $event->sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                $event->sheet->setAutoFilter('A:D');
            },
        ];
    }

    public function collection()
    {

        set_time_limit(0);
        ini_set('memory_limit', '6000M');

        $navigation_history = DB::table('get_navigation_history')->get();
        return new NavigationHistoryCollection($navigation_history);
    }
}
