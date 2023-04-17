<?php

namespace App\Exports\V1;

use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Http\Resources\V1\UserCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Traits\FunctionGeneralTrait;
use App\Models\User;

class UsersExport implements  FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents, ShouldAutoSize
{
    use Exportable, FunctionGeneralTrait;
    protected  $data;
    protected  $user;

    public function __construct($data)
    {
        $this->data = $data;
        $this->user = new User();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name . $user->lastname,
            $user->email,
            $user->address,
            $user->gender,
            $user->document_number,
            $user->document_type,
            $user->phone,
            $user->roles[0]->name,
            $user->created_at?->format('Y-m-d G:i:s'),
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
            "NOMBRE",
            "EMAIL",
            "DIRECCION",
            "GENERO",
            "NUMERO DOCUMENTO",
            "TIPO DE DOCUMENTO",
            "TELEFONO",
            "ROL",
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

        $users = $this->user->whereNotIn('id', [1,2])->get();
        return new UserCollection($users);
    }
}
