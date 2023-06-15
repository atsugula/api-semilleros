<?php

namespace App\Exports\V1;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Traits\FunctionGeneralTrait;

class UsersInfoExport implements  WithMultipleSheets
{
    use Exportable, FunctionGeneralTrait;

    protected  $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        set_time_limit(0);
        ini_set('memory_limit', '20000M');

        $sheets = [
            'getreport_of_deputy_regional_technical_director' => new UserSubDirectorRegionalExport($this->data),
            'get_report_regional_coordinator' => new UserRegionalCoordinatorExport($this->data),
            'get_report_methodologist' => new UserMethodologistExport($this->data),
            'get_report_psicosocial' => new UserPsicosocialExport($this->data),
            'get_report_sports_monitor' => new UserMonitorExport($this->data),
        ];

        return $sheets;
    }

}
