<?php

namespace App\Exports\V1;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class CustomVisitPsicosocialExport implements FromView, WithTitle
{
    use Exportable, FunctionGeneralTrait;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function title(): string
    {
        return 'VISITA PERSONALIZADA';
    }

    public function view(): View
    {
        set_time_limit(0);
        ini_set('memory_limit', '20000M');

        $psychologicalVisits = DB::table('get_report_custom_psychological_visits')->get();

        return view('exports.customPsychologicalVisits', [
            'psychologicalVisits' => $psychologicalVisits,
        ]);
    }

}
