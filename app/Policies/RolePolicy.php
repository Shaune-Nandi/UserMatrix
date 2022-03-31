<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;



class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function adminsOnlyAuthorization(User $user){

        $user_id = $user->id; // The id of the current logged in user

        $Role_admin_id = DB::table('roles') // Retrievs the id of admin role
            ->where('slug', 'admin')
            ->value('id');


        $role = DB::table('role_user')
            ->where('user_id', $user_id)
            ->where('role_id', $Role_admin_id)
            ->count();

        return $role === 1
            ? Response::allow()
            : Response::deny('Only Admins can view this page');

    }

}
