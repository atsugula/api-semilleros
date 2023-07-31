<?php

namespace App\Repositories;

use App\Http\Resources\V1\EventCollection;
use App\Http\Resources\V1\EventResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\Event_support;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use App\Traits\UserDataTrait;
use App\Traits\ImageTrait;

class EventRepository
{

    use ImageTrait, FunctionGeneralTrait, UserDataTrait;
    use FunctionGeneralTrait;

    private $model;

    function __construct()
    {
        $this->model = new Event_support();
    }

    public function getAll($iduser)
    {
        if($iduser != null){
            $user_id = $iduser;
            $rol_id = RoleUser::where('user_id', $iduser)->first()->role_id;
        }else{
            $user_id = $this->getIdUserAuth();
            $rol_id = $this->getIdRolUserAuth();
        }
        $results = $this->model::orderBy('created_at', 'ASC');
        if ($rol_id == config('roles.coordinador_regional')) {
            $results = $results->where('created_by', $user_id);
        }
        $results = $results->get();
        $results = new EventCollection($results);
        return $results;
    }

    public function create($request)
    {
        $event = $this->model::create($request);
        $event->created_by = Auth::user()->id;
        $event->status_id = config('status.ENR');
        $event->save();
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        $this->control_data($event,'store');
        $result = new EventResource($event);
        return $result;
    }

    public function findById($id)
    {
        $event = $this->model::findOrFail($id);
        $result = new EventResource($event);
        return $result;
    }

    public function update($data, $id)
    {
        $event = $this->model::findOrFail($id);
        $event->update($data);
        /* HACEMOS UN CONTROL DE LA INFORMACION */
        $this->control_data($event, 'update');
        $result = new EventResource($event);
        return $result;
    }

    public function delete($id)
    {
        $event = $this->model::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
}
