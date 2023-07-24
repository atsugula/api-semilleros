<?php

namespace App\Repositories;

use App\Http\Resources\V1\UserCollection;
use App\Models\Disciplines;
use App\Traits\FunctionGeneralTrait;
use Illuminate\Support\Facades\Hash;
use App\Models\MunicipalityUser;
use App\Models\DisciplineUser;
use App\Models\ZoneUser;
use App\Models\RoleUser;
use App\Models\User;
use App\Traits\UserDataTrait;
use Illuminate\Support\Facades\DB;
use App\Mail\RegisterUserMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserRepository
{

    use FunctionGeneralTrait, UserDataTrait;

    private $model;
    function __construct()
    {
        $this->model = new User();
    }

    /**
     * > It returns a collection of users, ordered by id, ascending
     *
     * @return A collection of users.
     */
    function getAll()
    {

        $query = $this->model->orderBy('id', 'ASC');

        $rol_id = $this->getIdRolUserAuth();

        if ($rol_id == config('roles.super_root')){
            $query->whereHas('roles', function ($profile) {
                $profile->whereNotIn('roles.id', [config('roles.super_root')]);
            });
        }

        if ($rol_id == config('roles.asistente_administrativo')){
            $query = $query->where('asistent_id', Auth::user()->id);
        }

        if ($rol_id == config('roles.metodologo')){
            $query = $query->where('methodology_id', Auth::user()->id);
        }
        if(in_array($rol_id, [config('roles.coordinador_regional'), config('roles.director_programa'), config('roles.subdirector_tecnico'), config('roles.psicologo'), config('roles.coordinador_maritimo')])){
            $query = $query->where('manager_id', Auth::user()->id);
        }
        if(in_array($rol_id, [config('roles.coordinador_psicosocial')])){
            $query->whereHas('roles', function ($profile) {
                $profile->where('roles.id', [config('roles.psicologo')]);
            });
        }
        $cantRegistros = $query->get()->count();
        return  new UserCollection($query->paginate($cantRegistros));

    }
    function getHistory($id)
    {
        $user =  $this->model->with('navigationHistory')->find($id);
        return $user;
        $query = $this->model->orderBy('id', 'ASC');

        $rol_id = $this->getIdRolUserAuth();

        if ($rol_id == config('roles.root')){
            $query->whereHas('roles', function ($profile) {
                $profile->whereNotIn('roles.id', [config('roles.super_root')]);
            });
        }

        return  new UserCollection($query->paginate(200));

    }

    /**
     * It creates a new user.
     *
     * @param user The user data to be stored in the database.
     *
     * @return The new user created.
     */
    function create($user)
    {
        $user['password'] = Hash::make($user['document_number']);
        $new_user = $this->model->create($user);

        if ($new_user->wasRecentlyCreated) {


            if (
                $user['roles'] == '1' || $user['roles'] == '2' ||
                $user['roles'] == '4' ||
                $user['roles'] == '9' || $user['roles'] == '10' ||
                $user['roles'] == '11' || $user['roles'] == '12'
                ) {
                // Roles
                RoleUser::create([
                    'user_id' => $new_user->id,
                    'role_id' =>  $user['roles'],
                ]);
                // Regiones o zonas - usuarios
                $zonaArray = explode(",", $user['zones']);
                foreach ($zonaArray as $key => $value) {
                    ZoneUser::create([
                        'user_id' => $new_user->id,
                        'zones_id' =>  $value,
                    ]);
                }

                // Municipios - usuarios
                foreach ($user['municipalities'] as $key => $value) {
                    MunicipalityUser::create([
                        'user_id' => $new_user->id,
                        'municipalities_id' => $value,
                    ]);
                }

                // Diciplinas - usuarios
                if($user['roles'] == '12'){
                    foreach ($user['disciplines'] as $key => $value) {
                        DisciplineUser::create([
                            'user_id' => $new_user->id,
                            'disciplines_id' => $value,
                        ]);
                    }
                }
            }else{
                // Roles - usuarios
                RoleUser::create([
                    'user_id' => $new_user->id,
                    'role_id' =>  $user['roles'],
                ]);
            }
        }
        // Guardamos en ModelData
        $this->control_data($new_user, 'store');


        $correo = new RegisterUserMailable($new_user);

        Mail::to($new_user['email'])->send($correo);

        return $new_user;
    }

    /**
     * > Find a user by id, and also find the user's roles and profile
     *
     * @param id The id of the user you want to find.
     *
     * @return A user object with the roles and profile.
     */
    function findById($id)
    {
        $user =  $this->model
                ->leftjoin('role_user', 'users.id', 'role_user.user_id')
                ->leftjoin('roles', 'role_user.role_id', 'roles.id')
                ->leftjoin('discipline_users','users.id', 'discipline_users.user_id')
                ->leftjoin('disciplines', 'discipline_users.disciplines_id', 'disciplines.id')
                ->leftjoin('municipality_users', 'users.id', 'municipality_users.user_id')
                ->leftjoin('municipalities', 'municipality_users.municipalities_id', 'municipalities.id')
                ->leftjoin('zone_users', 'users.id', 'zone_users.user_id')
                ->leftjoin('zones', 'zone_users.zones_id', 'zones.id')
                ->select(
                    'users.*',
                    'role_user.role_id as rol_id',
                    'roles.name as rol_name',
                    'discipline_users.disciplines_id as discipline_id',
                    'disciplines.name as discipline_name',
                    'municipality_users.municipalities_id as municipalitie_id',
                    'municipalities.name as municipalitie_name',
                    'zone_users.zones_id as zone_id',
                    'zones.name as zone_name'
                )
                ->with('roles', 'zone', 'municipalities', 'disciplines')
                ->find($id);
        $repoProfile = new ProfileRepository();
        $profile = $repoProfile->findByUserId($id);
        if ($profile) {
            $profile->role;
            $user->profile = $profile;
        }

        return $user;
    }

    /**
     * It updates the user's password.
     *
     * @param data The data to be inserted into the database.
     * @param id The id of the user you want to update.
     *
     * @return The user updated.
     */
    function update($data, $id)
    {
        $data['password'] = Hash::make($data['document_number']);
        $user_up = $this->model->findOrFail($id);

        if ($user_up->update($data)) {
            $rol = RoleUser::where('user_id', $user_up->id)->first();

            if(
                $data['roles'] == '1' || $data['roles'] == '2' ||
                $data['roles'] == '4' ||
                $data['roles'] == '9' || $data['roles'] == '10' ||
                $data['roles'] == '11' || $data['roles'] == '12'
            ){

                $rol->role_id = $data['roles'];
                $rol->user_id = $user_up->id;
                $rol->save();

                // Regiones o zonas - usuarios
                if($data['zones']){
                    $zones = ZoneUSer::where('user_id', $user_up->id)->delete();
                    foreach (explode(",", $data['zones']) as $key => $value) {
                        $zones = new ZoneUser();
                        $zones->zones_id = $value;
                        $zones->user_id = $user_up->id;
                        $zones->save();
                    }
                }

                // Municipios
                if($data['municipalities']){
                    MunicipalityUser::where('user_id', $user_up->id)->delete();
                    foreach ($data['municipalities'] as $key => $value) {
                        $muni = new MunicipalityUser();
                        $muni->municipalities_id = $value;
                        $muni->user_id = $user_up->id;
                        $muni->save();
                    }
                }

                // Diciplinas
                if(isset($data['disciplines']) && $data['roles'] == '12'){
                    $discipline = DisciplineUser::where('user_id', $user_up->id)->delete();
                    foreach ($data['disciplines'] as $key => $value) {
                        $discipline = new DisciplineUser();
                        $discipline->disciplines_id = $value;
                        $discipline->user_id = $user_up->id;
                        $discipline->save();
                    }
                }
            }else{
                $rol->role_id = $data['roles'];
                $rol->user_id = $user_up->id;
                $rol->save();
            }
        }
        // Guardamos en ModelData
        $this->control_data($user_up, 'update');

        // $correo = new RegisterUserMailable($user_up);

        // Mail::to($user_up['email'])->send($correo);

        return $user_up;
    }

    /**
     * It deletes the row with the id that is passed in.
     *
     * @param id The id of the model you want to delete.
     *
     * @return The model is being returned.
     */
    function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * It returns all the users in the database.
     *
     * @return A collection of users with their profiles and roles.
     */
    function noPaginate()
    {
        return $this->model->all()->map(function ($user) {
            $repoProfile = new ProfileRepository();
            $profile = $repoProfile->findByUserId($user->id);
            if ($profile) {
                $profile->role;
                $user->profile = $profile;
            }
            $user->roles;
            return $user;
        });;
    }

    /**
     * It takes a request object, finds the user in the database, changes the password, and saves the
     * user
     *
     * @param request The request object
     */
    function changePassword($request)
    {
        $user =  $this->model->find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
    }

    /**
     * It changes the status of a user
     *
     * @param request The request object.
     */
    function changeStatus($request)
    {
        $user =  $this->model->find($request->id);
        $user->status = $request->status;
        $user->save();
    }

    /**
     * It returns all the users with their roles, zone and hierarchy.
     *
     * @return All users with their roles, zone and hierarchy.
     */
    public function allData()
    {
        return User::with('roles', 'zone', 'hierarchy')->get();
    }

    // Metodo para traer la gente que revisa
    // en base al rol que se escoge en la creacion
    public function reviewsUsers($role_id){
        $data = [];
        switch ($role_id) {
            case config('roles.monitor'):
                $data = User::select('id as value', 'name as label')
                                ->whereHas('roles', function ($query) {
                                    $query->where('roles.id', '=', config('roles.metodologo'));
                                })->get();
                break;

            default:
                # code...
                break;
        }
        return $data;
    }

}
