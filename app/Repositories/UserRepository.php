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

        if ($rol_id == config('roles.root')){
            $query->whereHas('roles', function ($profile) {
                $profile->whereNotIn('roles.id', [config('roles.super_root')]);
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

        return  new UserCollection($query->paginate(25));

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
        // $user['password'] = Hash::make($user['password']);
        $user['password'] = Hash::make('12345678');
        $new_user = $this->model->create($user);

        if ($new_user->wasRecentlyCreated) {

            // Roles
            RoleUser::create([
                'user_id' => $new_user->id,
                'role_id' =>  $user['roles'],
            ]);

            // Regiones o zonas
            ZoneUser::create([
                'user_id' => $new_user->id,
                'zones_id' =>  $user['zones'],
            ]);

            // Municipios
            foreach ($user['municipalities'] as $key => $value) {
                MunicipalityUser::create([
                    'user_id' => $new_user->id,
                    'municipalities_id' => $value,
                ]);
            }

            // Diciplinas
            foreach ($user['disciplines'] as $key => $value) {
                DisciplineUser::create([
                    'user_id' => $new_user->id,
                    'disciplines_id' => $value,
                ]);
            }
        }

        $role = DB::table('roles')->where('id', '=', $user['roles'])->get();
        $new_user->roles()->attach($role[0]->id);

        // Guardamos en ModelData
        $this->control_data($new_user, 'store');
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
        $user =  $this->model->with('roles', 'zone', 'municipalities', 'disciplines')->find($id);
        //$user
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
        $data['password'] = Hash::make($data['password']);
        $user_up = $this->model->findOrFail($id);

        if ($user_up->update($data)) {
            $rol = RoleUser::where('user_id', $user_up->id)->first();
            $muni = MunicipalityUser::where('user_id', $user_up->id)->first();
            $zones = RoleUser::where('user_id', $user_up->id)->first();
            $discipline = DisciplineUser::where('user_id', $user_up->id)->first();

            if ($rol) {
                $rol->role_id = $data['roles'];
                $rol->user_id = $user_up->id;
                $rol->save();

                $zones->zones_id = $data['zones'];
                $zones->user_id = $user_up->id;
                $zones->save();

                // Municipios
                foreach ($data['municipalities'] as $key => $value) {
                    $muni->municipalities_id = $value;
                    $muni->user_id = $user_up->id;
                    $muni->save();
                }

                // Diciplinas
                foreach ($data['disciplines'] as $key => $value) {
                    $discipline->disciplines_id = $value;
                    $discipline->user_id = $user_up->id;
                    $discipline->save();
                }
            }
        }
        $role = DB::table('roles')->where('id', '=', $data['roles'])->get();
        $user_up->roles()->attach($role[0]->id);
        // Guardamos en ModelData
        $this->control_data($user_up, 'update');
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
    public function reviewsUsers($role){
        $result = [];
        switch ($role) {
            case 'value':
                # code...
                break;

            default:
                # code...
                break;
        }
    }

}
