<?php

namespace App\Repositories;

use App\Http\Resources\V1\TransversalActivityCollection;
use App\Http\Resources\V1\TransversalActivityResource;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\FunctionGeneralTrait;
use App\Models\TransversalActivity;
use App\Traits\UserDataTrait;
use App\Models\EvidenceFile;
use Illuminate\Support\Str;
use App\Traits\ImageTrait;
use Exception;

class TransversalActivityRepository
{
    use ImageTrait, FunctionGeneralTrait, UserDataTrait;

    private $model;
    private $modelEvidence;

    function __construct()
    {
        $this->modelEvidence = new EvidenceFile();
        $this->model = new TransversalActivity();
    }

    public function getAll()
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $query = $this->model->query();

        if ($rol_id == config('roles.director_programa')) {
            $query->where('status_id', config('status.ENR'))
                ->whereNotIn('created_by', [1,2]);
        }

        if ($rol_id == config('roles.psicologo')) {
            $query->where('created_by', $user_id)->orderBy('id', 'DESC');
        }

        $paginate = config('global.paginate');

        // Aplicar filtros adicionales desde la URL
        $query = $this->model->scopeFilterByUrl($query);

        // Calcular número de páginas para paginación
        session()->forget('count_page_transversal_activity');
        session()->put('count_page_transversal_activity', ceil($query->get()->count()/$paginate));

        return new TransversalActivityCollection($query->simplePaginate($paginate));
    }

    public function create($request)
    {

        $user_id = $this->getIdUserAuth();

        $transversalActivity = $this->model;
        $transversalActivity->date_visit = $request['date_visit'];
        $transversalActivity->nro_assistants = $request['nro_assistants'];
        $transversalActivity->activity_name = $request['activity_name'];
        $transversalActivity->objective_activity = $request['objective_activity'];
        $transversalActivity->scene = $request['scene'];
        $transversalActivity->meeting_planing = $request['meeting_planing'];
        $transversalActivity->team_socialization = $request['team_socialization'];
        $transversalActivity->development_activity = $request['development_activity'];
        $transversalActivity->content_network = $request['content_network'];
        $transversalActivity->municipality_id = $request['municipality_id'];
        $transversalActivity->status_id = config('status.ENR');
        $transversalActivity->reject_message = $request['rejection_message'];
        $transversalActivity->created_by = $user_id;
        $save = $transversalActivity->save();

        // /* SUBIMOS EL ARCHIVO */
        if ($save) {
            $this->uploadAll($request, $transversalActivity->id);
        }

        // /* GUARDAMOS EN DATAMODEL */
        $this->control_data($transversalActivity, 'store');
        $results = new TransversalActivityResource($transversalActivity);
        return $results;
    }

    public function findById($id)
    {
        $transversalActivity = $this->model->findOrFail($id);
        return new TransversalActivityResource($transversalActivity);
    }

    public function update($request, $id)
    {
        $rol_id = $this->getIdRolUserAuth();
        $user_id = $this->getIdUserAuth();

        $transversalActivity = $this->model->findOrFail($id);

        /* CAMBIAMOS EL ESTADO SEGUN EL ROL ASIGNADO A REVISAR */
        if ($rol_id == config('roles.director_programa')) {
            $transversalActivity->reviewed_by = $user_id;
            $transversalActivity->status_id = $request['status_id'];
            $transversalActivity->reject_message = $request['reject_message'];
        }

        /* CAMBIAMOS EL ESTADO SI ESTA RECHAZADO*/
        if ($request['status_id'] == config('status.REC') && $user_id == $transversalActivity->created_by) {
            $transversalActivity->status_id = config('status.ENR');
            $transversalActivity->reject_message = $request['reject_message'];
        }

        if ($user_id == $transversalActivity->created_by) {
            $transversalActivity->date_visit = $request['date_visit'];
            $transversalActivity->nro_assistants = $request['nro_assistants'];
            $transversalActivity->activity_name = $request['activity_name'];
            $transversalActivity->objective_activity = $request['objective_activity'];
            $transversalActivity->scene = $request['scene'];
            $transversalActivity->meeting_planing = $request['meeting_planing'];
            $transversalActivity->team_socialization = $request['team_socialization'];
            $transversalActivity->development_activity = $request['development_activity'];
            $transversalActivity->content_network = $request['content_network'];
            $transversalActivity->municipality_id = $request['municipality_id'];
        }
        $save = $transversalActivity->save();
        // /* SUBIMOS EL ARCHIVO */
        if ($save && $rol_id != config('roles.director_programa')) {
            $this->updateAllFiles($request, $transversalActivity->id);
        }

        // /* GUARDAMOS EN DATAMODEL */
        $this->control_data($transversalActivity, 'update');
        $results = new TransversalActivityResource($transversalActivity);
        return $results;
    }

    public function delete($id)
    {
        // Se eliminan las evidencias
        $evidences = $this->modelEvidence->where('transversal_id', $id)->get();
        foreach ($evidences as $evidence) {
            $evidence->delete();
        }
        // y luego la actividad
        $transversalActivity = $this->model->findOrFail($id);
        $transversalActivity->delete();
        return response()->json(['items' => 'La actividad transversal fue eliminada correctamente.']);
    }

    public function getValidate($data, $method){

        $validate = [
            'date_visit' => 'bail|required',
            'nro_assistants' => 'bail|required',
            'activity_name' => 'bail|required',
            'objective_activity' => 'bail|required',
            'scene' => 'bail|required',
            'meeting_planing' => 'bail|required',
            'team_socialization' => 'bail|required',
            'development_activity' => 'bail|required',
            'content_network' => 'bail|required',
            'municipality_id' => 'bail|required',
            'file' => $method != 'update' ? 'bail|required|mimes:application/pdf,pdf,png,webp,jpg,jpeg|max:' . (500 * 1049000) : 'bail',
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'file' => 'El archivo',
            'date_visit' => 'Fecha',
            'nro_assistants' => 'Numero de asistentes',
            'activity_name' => 'Nombre de la actividad',
            'objective_activity' => 'Objetivo de la actividad',
            'scene' => 'Escena',
            'meeting_planing' => 'Planificación de reuniones',
            'team_socialization' => 'Socialización del equipo',
            'development_activity' => 'Actividad de desarrollo',
            'content_network' => 'Red de contenidos',
            'municipality_id' => 'Municipio',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

    /* SUBIR DOCUMENTOS A TRAVES DEL DROPZONE */
    public function uploadAll($request, $id) {

        $files = $request->file('file');
        // If the variable '$files' is not empty, we update the registry with the new images
        if (!empty($files)) {
            try {
                // Validate that the name and image format are present.
                $request->validate([
                    'file.*' => 'bail|required|mimes:jpeg,png,gif,pdf|max:2048',
                ]);
                // We receive one or more images and update them.
                $path = storage_path('app/public') . "/transversal_activities/$id/";
                foreach ($request->file('file') as $file) {
                    $name = strtolower(Str::random(10));
                    $image = Image::make($file);
                    $image->encode('png', 90);
                    // Create folder directory and save
                    Storage::disk('public')->makeDirectory('transversal_activities/' . $id);
                    $image->save($path . $name . '.png');
                    // Save url image for load in database
                    $url = "transversal_activities/{$id}/{$name}.png";
                    // Save in database with relation
                    $this->modelEvidence->create([
                        'model' => "Evidencia Actividad Transversal $id",
                        'path' => $url,
                        'transversal_id' => $id,
                    ]);
                }
                return [
                    'response' => ['status' => true, 'name' => 'transversal_activities', 'message' => 'Se ha guardado con éxito']
                ];
            } catch (\Exception $ex) {
                return [
                    'response' => ['status' => false, 'name' => $ex->getMessage(), 'message' => $ex->getMessage()]
                ];
            }
        }
    }

    /* ACTUALIZAR DOCUMENTOS QUE VIENEN A TRAVES DEL DROPZONE */
    public function updateAllFiles($request, $id) {

        try {
            $files = $request->file('file');
            $evidences = $this->modelEvidence->where('transversal_id', $id)->get();
            if (!empty($files)) {
                foreach ($evidences as $evidence) {
                    Storage::disk('public')->delete($evidence->path);
                    $evidence->delete();
                }
                $response = $this->uploadAll($request, $id);
                return $response;
            }
        } catch (Exception $ex) {
            return [
                'response' => ['success' => false, 'payload' => $ex->getMessage()]
            ];
        }

    }

}
