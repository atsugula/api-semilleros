<?php

namespace App\Repositories;

use App\Http\Resources\V1\ChronogramCollection;
use App\Http\Resources\V1\ChronogramResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\Chronogram;
use App\Models\ChronogramsGroups;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ChronogramRepository
{

    private $model;
    function __construct()
    {
        $this->model = new Chronogram();
    }

    use FunctionGeneralTrait;

    public function getAll()
    {
        $cronograms = new ChronogramCollection($this->model->orderBy('id', 'DESC')->with(['mes', 'municipio'])->get());
        return $cronograms;
    }
    public function create($request)
    {
        $request->created_by = Auth::id();
        $cronograms = $this->model->create($request);
        // Guardamos en dataModel
        $this->control_data($cronograms, 'store');

        $schedulesModel = new Schedule();
        
        $lista = json_decode( $request->groups );
        
        foreach($lista as $group) {
            $groupsModel = new ChronogramsGroups();
            $groupsModel->chronograms_id             = $cronograms->id;
            $groupsModel->group_id                   = $group->group_id;
            $groupsModel->sports_modality            = $group->sports_modality;
            $groupsModel->main_sports_stage_name     = $group->main_sports_stage_name;
            $groupsModel->main_sports_stage_address  = $group->main_sports_stage_address;
            $groupsModel->alt_sports_stage_name      = $group->alt_sports_stage_name;
            $groupsModel->alt_sports_stage_address   = $group->alt_sports_stage_address;
            $groupsModel->save();

            $schedules = [];

            foreach ($group->schedules as $schedule) {
                $schedules[] = [
                    'chronograms_groups_id' => $groupsModel->id,
                    'day'                   => $schedule->day,
                    'start_time'            => $schedule->start_time,
                    'end_time'              => $schedule->end_time,
                ];
            }
    
            $schedulesModel->insert( $schedules );
        }

        $results = new ChronogramResource($cronograms);
        return $results;
    }

    public function findById($id)
    {
        $cronogram = $this->model->with(['mes', 'municipio', 'groups.schedules'])->findOrFail($id);
        return $cronogram;
    }

    public function update($data)
    {
        $data['created_by'] = Auth::id();
        $cronograms = $this->model->findOrFail($data['id']);
        $cronograms->update($data);

        // Guardamos en dataModel
        $this->control_data($cronograms, 'update');

        $groupsModel = new ChronogramsGroups();
        $groupsModel->where('chronograms_id', $data['id'])->delete();
        
        $schedulesModel = new Schedule();
        
        $lista = json_decode( $data['groups'] );
        
        foreach($lista as $group) {
            $groupsModel = new ChronogramsGroups();
            $groupsModel->chronograms_id             = $data['id'];
            $groupsModel->group_id                   = $group->group_id;
            $groupsModel->sports_modality            = $group->sports_modality;
            $groupsModel->main_sports_stage_name     = $group->main_sports_stage_name;
            $groupsModel->main_sports_stage_address  = $group->main_sports_stage_address;
            $groupsModel->alt_sports_stage_name      = $group->alt_sports_stage_name;
            $groupsModel->alt_sports_stage_address   = $group->alt_sports_stage_address;
            $groupsModel->save();

            $schedules = [];

            foreach ($group->schedules as $schedule) {
                $schedules[] = [
                    'chronograms_groups_id' => $groupsModel->id,
                    'day'                   => $schedule->day,
                    'start_time'            => $schedule->start_time,
                    'end_time'              => $schedule->end_time,
                ];
            }
    
            $schedulesModel->insert( $schedules );
        }

        $result = new ChronogramResource($cronograms);
        return $result;
    }

    public function delete($id)
    {
        $cronograms = $this->model->findOrFail($id);
        $cronograms->delete();
        return response()->json(['items' => 'El Cronograma fue eliminado correctamente.']);
    }

    public function getValidate($data, $method){

        $validate = [
            'month'                     => 'bail|required',
            'municipality'              => 'bail|required',
            'note'                      => 'bail|required|string',
            'groups'                    => 'bail|required'
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'month'         => 'Mes',
            'municipality'  => 'Municipio',
            'note'          => 'Observación',
            'groups'        => 'Grupos',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

}
