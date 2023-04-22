<?php

namespace App\Repositories;

use App\Exports\V1\TransversalActivityExport;
use App\Exports\V1\NavigationHistoryExport;
use App\Exports\V1\VisitSubDirectorExport;
use App\Exports\V1\CoordinatorVisitExport;
use App\Exports\V1\CustomVisitExport;
use App\Exports\V1\InscriptionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\V1\UsersInfoExport;
use App\Exports\V1\UsersExport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportRepository
{

    function controlReport($request)
    {
        switch ($request->type_excel) {
            case 'users':
                return $this->exportUsers($request);
                break;
            case 'infoUsers':
                return $this->exportUsersInfo($request);
                break;
            case 'visitSubDirector':
                return $this->exportVisitSubDirector($request);
                break;
            case 'transversalActivity':
                return $this->exportTransversalActivity($request);
                break;
            case 'coordinatorVisit':
                return $this->exportCoordinatorVisit($request);
                break;
            case 'customVisit':
                return $this->exportCustomVisit($request);
                break;
            case 'inscriptions':
                return $this->exportInscription($request);
                break;
            case 'navigationHistory':
                return $this->exportNavigationHistory($request);
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

    public function exportVisitSubDirector($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new VisitSubDirectorExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportTransversalActivity($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new TransversalActivityExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportCoordinatorVisit($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new CoordinatorVisitExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportCustomVisit($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new CustomVisitExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportInscription($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new InscriptionExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

    public function exportNavigationHistory($request)
    {
        try {
            if (!$request->data) {
                return Excel::download(new NavigationHistoryExport($request), "$request->type_excel.xlsx");
            }
            return User::count();
        } catch (\Exception $ex) {
            report($ex);
            return response()->json(['error' => 'Error obteniendo el dato ' . $ex->getMessage() . ', buscar en linea de codigo ' . $ex->getLine(), 'success' => false], 404);
        }
    }

}
