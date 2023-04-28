<?php

namespace App\Exports\V1;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class VisitSubDirectorExport implements FromView, WithTitle
{
    use Exportable, FunctionGeneralTrait;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function title(): string
    {
        return 'VISITA SUBDIRECTOR';
    }

    public function view(): View
    {
        set_time_limit(0);
        ini_set('memory_limit', '20000M');

        $visitSubDirector = DB::table('get_report_visits_subdirector')->get();

        return view('exports.visitSubDirector', [
            'visitSubDirector' => $visitSubDirector,
        ]);
    }

}
