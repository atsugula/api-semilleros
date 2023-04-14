<?php

namespace App\Repositories;

use App\Http\Resources\V1\CoordinatorVisitCollection;
use App\Http\Resources\V1\CoordinatorVisitResource;
use App\Interfaces\CrudRepositoryInterface;
use App\Traits\FunctionGeneralTrait;
use App\Models\CoordinatorVisit;
use App\Traits\ImageTrait;
use App\Traits\UserDataTrait;

class CoordinatorVisitsRepository implements CrudRepositoryInterface
{

    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new CoordinatorVisit();
    }

    use FunctionGeneralTrait;

    public function getAll()
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $query = $this->model->query()->orderBy('id', 'DESC');

        if($rol_id == config('roles.coordinador_psicosocial') || $rol_id == config('roles.coordinador_regional') || $rol_id == config('roles.coordinador_zona_maritima')) {
            $query->where('created_by', $user_id)
                ->whereNotIn('status_id', [config('status.APR')]);
        }

        if ($rol_id == config('roles.subdirector_tecnico')) {
            $query->whereNotIn('created_by', [1,2])
                ->whereNotIn('status_id', [config('status.APR')]);
        }

        $paginate = config('global.paginate');

        // Aplicar filtros adicionales desde la URL
        $query = $this->model->scopeFilterByUrl($query);

        // Calcular número de páginas para paginación
        session()->forget('count_page_visitCoordinators');
        session()->put('count_page_visitCoordinators', ceil($query->get()->count()/$paginate));

        return new CoordinatorVisitCollection($query->simplePaginate($paginate));
    }
    public function create($request)
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();
        $coordinator_visits = $this->model;

        $coordinator_visits->hour_visit = $request['hour_visit'];
        $coordinator_visits->date_visit = $request['date_visit'];
        $coordinator_visits->observations = $request['observations'];
        $coordinator_visits->description = $request['description'];
        $coordinator_visits->sports_scene = $request['sports_scene'];
        $coordinator_visits->beneficiary_coverage = $request['beneficiary_coverage'];
        $coordinator_visits->municipalitie_id = $request['municipalitie_id'];
        $coordinator_visits->sidewalk = $request['sidewalk'];
        $coordinator_visits->user_id = $request['user_id'];
        $coordinator_visits->discipline_id = $request['discipline_id'];
        $coordinator_visits->created_by = $user_id;
        // $coordinator_visits->revised_by = $request['revised_by'];
        $coordinator_visits->status_id = config('status.ENR');
        $coordinator_visits->rejection_message = $request['rejection_message'];
        $save = $coordinator_visits->save();
        /* SUBIMOS EL ARCHIVO */
        if ($save) {
            $handle_1 = $this->send_file($request, 'file', 'coordinator_visits', $coordinator_visits->id);
            $coordinator_visits->update(['file' => $handle_1['response']['payload']]);
            $save &= $handle_1['response']['success'];
        }
        // Guardamos en dataModel
        $this->control_data($coordinator_visits, 'store');
        $results = new CoordinatorVisitResource($coordinator_visits);
        return $results;
    }

    public function findById($id)
    {
        $visitCoordinator = $this->model->findOrFail($id);
        return new CoordinatorVisitResource($visitCoordinator);
    }

    public function update($request, $id)
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();
        $coordinator_visits = $this->model->findOrFail($id);

        $coordinator_visits->hour_visit = $request['hour_visit'];
        $coordinator_visits->date_visit = $request['date_visit'];
        $coordinator_visits->observations = $request['observations'];
        $coordinator_visits->description = $request['description'];
        $coordinator_visits->sports_scene = $request['sports_scene'];
        $coordinator_visits->beneficiary_coverage = $request['beneficiary_coverage'];
        $coordinator_visits->municipalitie_id = $request['municipalitie_id'];
        $coordinator_visits->sidewalk = $request['sidewalk'];
        $coordinator_visits->user_id = $request['user_id'];
        $coordinator_visits->discipline_id = $request['discipline_id'];

        if ($rol_id == config('roles.subdirector_tecnico')) {
            $coordinator_visits->revised_by = $user_id;
            $coordinator_visits->status_id = $request['status_id'];
            $coordinator_visits->rejection_message = $request['rejection_message'];
        }

        /* CAMBIAMOS EL ESTADO */
        if ($request['status_id'] == config('status.REC') && $user_id == $coordinator_visits->created_by) {
            $coordinator_visits->status_id = config('status.ENR');
            $coordinator_visits->rejection_message = $request['rejection_message'];
        }

        $save = $coordinator_visits->save();

        /* ACTUALIZAMOS EL ARCHIVO */
        if ($request->hasFile('file')) {
            $handle_1 = $this->update_file($request, 'file', 'coordinator_visits', $coordinator_visits->id, $coordinator_visits->file);
            $coordinator_visits->update(['file' => $handle_1['response']['payload']]);
        }
        // Guardamos en dataModel
        $this->control_data($coordinator_visits, 'update');
        $results = new CoordinatorVisitResource($coordinator_visits);
        return $results;
    }

    public function delete($id)
    {
        $coordinator_visits = $this->model->findOrFail($id);
        $coordinator_visits->delete();
        return response()->json(['items' => 'La visita metodologo fue eliminada correctamente.']);
    }

    public function getValidate($data, $method)
    {

        $validate = [
            'hour_visit' => 'bail|required',
            'date_visit' => 'bail|required',
            'sports_scene' => 'bail|required',
            'beneficiary_coverage' => 'bail|required',
            'observations' => 'bail|required',
            'description' => 'bail|required',
            'sidewalk' => 'bail|required',
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'hour_visit' => 'Hora visita',
            'date_visit' => 'Fecha visita',
            'sports_scene' => 'Escenario deportivo',
            'beneficiary_coverage' => 'Cobertura de benificiario',
            'observations' => 'Observaciones',
            'description' => 'Descripciones',
            'sidewalk' => 'Corregimiento/Vereda',
        ];

        return $this->validator($data, $validate, $messages, $attrs);
    }
}
