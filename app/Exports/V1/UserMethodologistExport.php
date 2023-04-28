<?php

namespace App\Exports\V1;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class UserMethodologistExport implements FromView, WithTitle
{
    use Exportable, FunctionGeneralTrait;
    protected  $data;
    private $sheetName;

    public function __construct($data)
    {
        $this->sheetName = $this->title();
        $this->data = $data;
    }

    public function title(): string
    {
        return 'METODOLOGO';
    }

    public function view(): View
    {
        set_time_limit(0);
        ini_set('memory_limit', '20000M');

        $users = DB::table('get_report_methodologist')->get();

        return view('exports.UserInfo', [
            'users' => $users,
        ]);

    }
}
