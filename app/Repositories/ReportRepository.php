<?php

namespace App\Repositories;

use App\Exports\V1\AmbassadorExport;
use App\Exports\V1\AttendantsExport;
use App\Exports\V1\BeneficiariesExport;
use App\Exports\V1\BinnacleBeneficiaryMultipleSheetsExport;
use App\Exports\V1\BinnacleManagersExport;
use App\Exports\V1\BinnaclePactMonitorsExport;
use App\Exports\V1\BinnacleTerritorieExport;
use App\Exports\V1\CulturalCirculationExport;
use App\Exports\V1\CulturalEnsembleExport;
use App\Exports\V1\CulturalSeedBedExport;
use App\Exports\V1\DialogueTablesExport;
use App\Exports\V1\GroupExport;
use App\Exports\V1\InscriptionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\V1\VariablesExport;
use App\Exports\V1\LoginAccessExport;
use App\Exports\V1\ManagerMonitoringsExport;
use App\Exports\V1\ManagerSupervisionvisitsExport;
use App\Exports\V1\MethodologicalAccompanimentReport;
use App\Exports\V1\MethodologicalInstructionModelsExport;
use App\Exports\V1\MethodologicalMonitoringExport;
use App\Exports\V1\MethodologicalSheetsOneExport;
use App\Exports\V1\MethodologicalSheetsTwoExport;
use App\Exports\V1\MethodologicalStrengtheningExport;
use App\Exports\V1\MonitoringReportExport;
use App\Exports\V1\ParentSchoolsExport;
use App\Exports\V1\PecsExport;
use App\Exports\V1\PedagogicalsExport;
use App\Exports\V1\PollDesertionsExport;
use App\Exports\V1\PollsExport;
use App\Exports\V1\PsychopedagogicalLogBooksExport;
use App\Exports\V1\PsychosocialInstructionsExport;
use App\Exports\V1\RevisionExport;
use App\Exports\V1\StrengtheningOfMonitoringReport;
use App\Exports\V1\StrengtheningSuperMonInsReport;
use App\Exports\V1\UsersExport;
use App\Exports\V1\InputHistory;
use App\Exports\V1\UsersInfoExport;
use App\Models\AccessLogin;
use App\Models\Binnacle;
use App\Models\CulturalCirculation;
use App\Models\CulturalEnsemble;
use App\Models\CulturalSeedbed;
use App\Models\DialogueTables\DialogueTable;
use App\Models\Group;
use App\Models\Inscriptions\Beneficiary;
use App\Models\Inscriptions\Inscription;
use App\Models\Inscriptions\Pec;
use App\Models\ManagerMonitoring;
use App\Models\MethodologicalAccompaniment;
use App\Models\MethodologicalInstructionModel;
use App\Models\MethodologicalMonitoring;
use App\Models\MethodologicalSheetsOne;
use App\Models\MethodologicalSheetsTwo;
use App\Models\ParentSchools\ParentSchool;
use App\Models\Pedagogical;
use App\Models\Poll;
use App\Models\PollDesertion;
use App\Models\PsychopedagogicalLogbooks\PsychopedagogicalLogbook;
use App\Models\PsychosocialInstructions\PsychosocialInstruction;
use App\Models\StrengtheningOfMonitoring;
use App\Models\StrengtheningSupervisionMonitorsInstructors;
use App\Models\User;

class ReportRepository
{

    function controlReport($request)
    {
        switch ($request->type_excel) {
            case 'users':
                return $this->exportUsers($request);
                break;
            case 'infoUsers':
                return $this->exportUsers($request);
                break;
            default:
                return 0;
                break;
        }
    }

    public function exportUsers($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new UsersExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportUsersInfo($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new UsersInfoExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

}
