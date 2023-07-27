<?php

use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\V1\PDFController as PDFController_V1;
use App\Http\Controllers\V1\ChronogramController;
use App\Http\Controllers\V1\ValidityPeriodController;
use App\Http\Controllers\V1\PermissionController;
use App\Http\Controllers\V1\ModuleItemController;
use App\Http\Controllers\V1\RoleUserController;
use App\Http\Controllers\V1\AsistantController;
use App\Http\Controllers\V1\GeneralController;
use App\Http\Controllers\V1\ModuleController;
use App\Http\Controllers\V1\AccessController;
use App\Http\Controllers\V1\BankController;
use App\Http\Controllers\V1\ClauseBaseController;
use App\Http\Controllers\V1\ProfileController;
use App\Http\Controllers\V1\ReportController;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V1\RoleController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ClauseController;
use App\Http\Controllers\V1\ContractController;
use App\Http\Controllers\V1\ContractorController;
use App\Http\Controllers\V1\DirectionController;
use App\Http\Controllers\V1\DisciplineController;
use App\Http\Controllers\V1\DocumentController;
use App\Http\Controllers\V1\EthnicityController;
use App\Http\Controllers\V1\EvaluationController;
use App\Http\Controllers\V1\EventSupportController;
use App\Http\Controllers\V1\HiringController;
use App\Http\Controllers\V1\MethodologistVisitController;
use App\Http\Controllers\V1\MunicipalityController;
use App\Http\Controllers\V1\HealthEntitiesController;
use App\Http\Controllers\V1\MonitorsController;
use App\Http\Controllers\V1\ObjectsController as V1ObjectsController;
use App\Http\Controllers\V1\UploadDocumentController;
use App\Http\Controllers\V1\StatusDocumentController;
use App\Http\Controllers\V1\SpecificcontratoractivityController;
use App\Http\Controllers\V1\ZonesController;
use App\Http\Controllers\V1\ZoneUserController;
use App\Http\Controllers\V1\BeneficiarieController;
use App\Http\Controllers\V1\CoordinatorVistsController;
use App\Http\Controllers\V1\CustomVisitController;
use App\Http\Controllers\V1\InfoContractorController;
use App\Http\Controllers\V1\MonthsController;
use App\Http\Controllers\V1\SidewalkController;
//use App\Http\Controllers\V1\VisitSubDirectorController;
use App\Http\Controllers\V1\TransversalActivityController;
use App\Http\Controllers\V1\VisitSubDirectorController;
use App\Http\Controllers\V1\VisitPsichologistController;
use App\Http\Controllers\V1\ReportVisitsController;
use App\Http\Controllers\V1\ReportCronogramCrontroller;
use App\Http\Controllers\V1\ZipReportsControllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'verified', 'logNavigationHistory', 'verifyUserStatus'])->prefix('v1')->group(function () {
    Route::get('get-access', [AccessController::class, 'getAccess']);
    Route::post('have-access', [AccessController::class, 'userHaveAccess']);
    Route::get('get-permissions', [AccessController::class, 'getPermissions']);
    Route::get('get-button-boolean-creates', [AccessController::class, 'getButtonBooleanCreates']);

    //Rutas de las apis para los crud
    Route::apiResources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'items' => ModuleItemController::class,
        'modules' => ModuleController::class,
        'ethicitys' => EthnicityController::class,
        'roleUser' => RoleUserController::class,
        'assistants' => AsistantController::class,
        'profiles' => ProfileController::class,
        'objects' => V1ObjectsController::class,
        'diciplines' => DisciplineController::class,
        'zones' => ZonesController::class,
        'status-documents' => StatusDocumentController::class,
        'specificcontratoractivitys' => SpecificcontratoractivityController::class,
        'hirings' => HiringController::class,
        'evaluations' => EvaluationController::class,
        'userZones' => ZoneUserController::class,
        // 'coordinator_visits' => CoordinatorVistsController::class,
        'info-contractor' => InfoContractorController::class,
        'chronogram' => ChronogramController::class,
    ]);


    /* VISITAS METODOLOGICAS */
    Route::apiResource('methodologist_visits', MethodologistVisitController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('methodologist_visits/{id}', [MethodologistVisitController::class, 'update']);

    /* VISITA COORDINADORES */
    Route::apiResource('coordinator_visits', CoordinatorVistsController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('coordinator_visits/{id}', [CoordinatorVistsController::class, 'update'])->name('coordinator_visits.update');

    /* VISITAS DE PSICOLOGIA PERSONALIZADAS */
    Route::apiResource('custom_visits', CustomVisitController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('custom_visits/{id}', [CustomVisitController::class, 'update'])->name('custom_visits.update');

    // ViSITAS DE PSICOLOGIA
    Route::apiResource('psychologistVisits', VisitPsichologistController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('psychologistVisits/{id}', [VisitPsichologistController::class, 'update'])->name('psychologistVisits.update');

    /* BUSCAR BENEFICIARIO */
    Route::get('findByBeneficiaryId/{id}', [CustomVisitController::class, 'getBeneficiary']);
    /* ACTIVIDAD TRANSVERSAL VISITA */
    Route::apiResource('transversal_activity', TransversalActivityController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('transversal_activity/{id}', [TransversalActivityController::class, 'update'])->name('transversal_activity.update');

    /* SUBIR ARCHIVOS VISITAS METODOLOGICAS */
    Route::post('upload/methodologist_visits', [MethodologistVisitController::class, 'uploadFiles']);

    // Descarga de reportes
    Route::get('getReportMethodologisticsVisits/{id}',[ReportVisitsController::class,'exportMethodologistVisit']);
    Route::get('GetReportPsycologicVisit/{id}',[ReportVisitsController::class,'exportPsychologistVisit']);
    Route::get('GetReportPsycologicCustomVisit/{id}',[ReportVisitsController::class,'exportPsychologistcustomVisit']);
    Route::get('GetReportTrasversalActivity/{id}',[ReportVisitsController::class,'exportPsychologisttransversalActivity']);
    Route::get('GetReportSubdirectorCustom/{id}',[ReportVisitsController::class,'exportvisitSubDirector']);
    Route::get('GetVisitRegionalCordinator/{id}',[ReportVisitsController::class,'ExportCoordinadorRegional']);
    Route::get('getReportBenefisiaries/{id}',[ReportVisitsController::class,'exportBeneficiariesMethodologistVisit']);
    Route::get('GetChronogram/{id}',[ReportVisitsController::class,'ExportChronogram']);

    //Descarga de zips
    Route::get('getZipChronogramaForMetodologo/{id}',[ZipReportsControllers::class,'GenerateChronogramZip']);


    // Descargar archivos de chronogram
    Route::get('getReportChronogram/{id}',[ReportVisitsController::class,'ReportChronogramController']);

    /* EVENTOS DE SOPORTE */
    Route::apiResource('eventSupports', EventSupportController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('eventSupports/{id}', [EventSupportController::class, 'update']);

    /* SIDEWALKS */
    Route::apiResource('sidewalks', SidewalkController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('sidewalks/{id}', [SidewalkController::class, 'update']);

    Route::get('get-document', [GeneralController::class, 'getDocument']);

    /* BENEFICIARIOS */
    Route::apiResource('beneficiaries', BeneficiarieController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::put('beneficiaries/{id}', [BeneficiarieController::class, 'update']);
    Route::put('beneficiaries/changeStatus/{id}', [BeneficiarieController::class, 'changeStatus']);

    // BENEFICIARIOS POR MUNICIPIO
    Route::get('getBeneficiariesMunicipality/{id}', [BeneficiarieController::class, 'getBeneficiariesMunicipality']);

    //Benficiarios por estado y region
    Route::get('getAllByUserRegion', [BeneficiarieController::class, 'getAllByUserRegion']);

    // CONTRATOS
    Route::apiResource('contracts', ContractController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('contracts/{id}', [ContractController::class, 'update']);
    Route::post('contracts-management', [ContractController::class, 'management']);
    Route::post('contracts-cancellation', [ContractController::class, 'cancellation']);

    // Periodo de vigencia
    Route::apiResource('validity_periods', ValidityPeriodController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('validity_periods/{id}', [ValidityPeriodController::class, 'update'])->name('validity_periods.update');

    /* VISITA SUBDIRECTOR */
    Route::apiResource('subdirector_visits', VisitSubDirectorController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::post('subdirector_visits/{id}', [VisitSubDirectorController::class, 'update'])->name('subdirector_visits.update');
    Route::get('visits_review_director', [VisitSubDirectorController::class, 'indexReview'])->name('visits_review_director.indexReview');

    //Informe mensual
    // Route::apiResource('monthly_monitoring_reports', 'App\Http\Controllers\V1\MonthlyMonitoringReportsController')->only(['index', 'store', 'show', 'destroy']);
    // Route::post('monthly_monitoring_reports/{id}', [MonthlyMonitoringReportsController::class, 'update'])->name('monthly_monitoring_reports.update');

    /* COMENZAMOS A SEPARAR LOS SELECTS PARA OPTIMIZACION DE PAGINAS */
    Route::get('get-status-select', [GeneralController::class, 'getSelectStatus']);

    //Listas desplegables
    Route::get('get-data-selects', [GeneralController::class, 'getDataSelects']);
    Route::get('getChangeDataModels', [GeneralController::class, 'getChangeDataModels'])->name('changeDataModels.index');
    Route::get('getChangeDataModels/{id}', [GeneralController::class, 'getChangeDataModels'])->name('changeDataModels.show');
    Route::delete('destroyChangeDataModel/{id}', [GeneralController::class, 'destroyChangeDataModel'])->name('changeDataModels.destroy');
    Route::get('getGroupBeneficiaries/{id?}', [GeneralController::class, 'getGroupBeneficiaries'])->name('getGroupBeneficiaries')->where(['id' => '[0-9]+']);

    /* TRAER REVISORES DISPONIBLES */
    Route::get('getSelectUsers/{id?}', [UserController::class, 'getSelectUsers']);

    // USER
    Route::get('usersNoPaginate', [UserController::class, 'noPaginate']);

    //ALL USER INFORMATION
    Route::get('information-users', [UserController::class, 'allData']);

    //ALL USER INFORMATION OF HISTORY
    Route::get('users/history/{id}', [UserController::class, 'history']);

    //CAMBIAR INACTIVO DE USUARIO
    Route::post('users/toggleUserStatus/{id}', [UserController::class, 'toggleUserStatus']);

    // PROFILES
    Route::get('findByGestorId/{id}', [ProfileController::class, 'findByGestorId']);

    //DIRECTIONS
    Route::get('directions', [DirectionController::class, 'index']);

    Route::get('config-clear', function () {
        Artisan::call('config:clear');
        echo '<a href=' . url('dashboard') . '>Se ha limpiado la configuración, volver al sistema.</a>';
    });
    Route::get('rollback', function () {
        Artisan::call('c:a');
        echo '<a href=' . url('dashboard') . '>Se ha limpiado la configuración, volver al sistema.</a>';
    });

    Route::get('getOneWithPick', [GeneralController::class, 'getOneWithPick'])->name('getOneWithPick');
    Route::get('selects', [GeneralController::class, 'getDynamicSelects'])->name('getDynamicSelects');
    Route::get('citiesByDepartment', [GeneralController::class, 'getCitiesByDepartment'])->name('getCitiesByDepartment');
    Route::get('consecutive/generate/{table}/{abreviature}', [GeneralController::class, 'getConsecutive'])->name('getConsecutiveGenerate');
    Route::prefix('exports')->group(function () {
        Route::post('excel/{type_excel?}', [ReportController::class, 'exportExcel'])->name('exportExcel');
        Route::prefix('pdf')->group(function () {
            Route::post('parentschools/{type_pdf?}', [PDFController_V1::class, 'formateParentSchools']);
            Route::post('contract/{type_pdf?}', [PDFController_V1::class, 'ContractFormat']);
            Route::get('download', [PDFController_V1::class, 'Download']);
        });
    });

    //Muestra todos los documentos relacionados al usuario logeado
    //Route::get('my-documents', [DocumentController::class, 'document'])->name('my-document');

    Route::post('users/changePassword', [UserController::class, 'changePassword'])->name('users.changePassword');
    Route::post('users/changeStatus', [UserController::class, 'changeStatus'])->name('users.changeStatus');

    //MUNICIPALITY
    Route::get('municipalities', [MunicipalityController::class, 'index']);

    // MUNICIPALITIES AND REGIONS
    Route::get('/regions/{regionId}/municipalities', [MunicipalityController::class, 'getMunicipalitiesByRegion']);

    //Health Entities
    Route::get('health-entities', [HealthEntitiesController::class, 'index']);

    // USUARIOS MONITORES POR MUNICIPIO
    Route::get('getMonitoringMunicipality/{id}', [MonitorsController::class, 'getMonitoringMunicipality']);
    Route::get('getdisiplinesMonitoring/{id}', [MonitorsController::class, 'getdisiplinesMonitoring']);
    Route::get('getMonitorByAuth', [MonitorsController::class, 'getMonitorByAuth']);

    //Muestra los meses restantes del año
    Route::get('months', [MonthsController::class, 'index']);

    // Subida de chronogramcx
    //Route::apiResource('chronogram', ChronogramController::class)->only(['index', 'store', 'show']);
    //Route::post('chronogram/{id}', [ChronogramController::class, 'update']);
    //Route::delete('chronogram', [ChronogramController::class, 'destroy']);
    //Route::post('document-upload', [UploadChronogramController::class, 'upload']);

    //Rutas de las excel apis
    //Route::get('descargas/export/', [UserExcelController::class, 'export']);

    // Ruta municipios y region de usuario logueado
    Route::get('User/Municipalities/{id}', [ZoneUserController::class, 'getUserRegionsMunicipalities']);

    // Ruta municipios usuarios disciplinas
    Route::get('Municipalities/User/Disciplines/{id}', [ZoneUserController::class, 'getMunicipalitiesUserDisciplines']);

    Route::get('users/disciplines/regions', [ZoneUserController::class, 'getUserDisciplineRegions']);

    // Ruta Todos los usuarios que pertenezcan a la region del usuario logueado
    Route::get('userlogin/users/regions', [UserController::class, 'getUserLoginUsersRegions']);

 });

/* RUTAS DE PRUEBA JORGE */

// Rutas de prueba V2 JOSE
//zarrok rutas de prueba
Route::get('getZipChronogramaForMetodologo/{id}',[ZipReportsControllers::class,'GenerateChronogramZip']);
Route::get('getZipBenefisiarie',[ZipReportsControllers::class,'GenerateBenefisiaries']);
// Route::get('getReportBenefisiaries/{id}',[ReportVisitsController::class,'exportMethodologistVisit']);
// Route::get('getReportMethodologisticsVisits/{id}',[ReportVisitsController::class,'exportMethodologistVisit']);
 Route::get('getReportBenefisiaries/{id}',[ReportVisitsController::class,'exportBeneficiariesMethodologistVisit']);






//Rutas de Pruebas Crango
// Route::apiResource('beneficiariess', BeneficiarieController::class)->only(['index', 'store', 'show', 'destroy']);
// Route::put('beneficiariess/{id}', [BeneficiarieController::class, 'update']);
// Route::put('beneficiariess/changeStatus/{id}', [BeneficiarieController::class, 'changeStatus']);
//Route::get('getAllByUserRegions', [BeneficiarieController::class, 'getAllByUserRegion']);
