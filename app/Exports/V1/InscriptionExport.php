<?php

namespace App\Exports\V1;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class InscriptionExport implements FromView, WithTitle
{
    use Exportable, FunctionGeneralTrait;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function title(): string
    {
        return 'INSCRIPCIONES';
    }

    public function view(): View
    {
        set_time_limit(0);
        ini_set('memory_limit', '20000M');

        $inscriptions = DB::table('get_report_inscriptions')->get();

        return view('exports.inscription', [
            'inscriptions' => $inscriptions,
        ]);
    }

}
