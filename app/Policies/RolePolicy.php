<?php

namespace App\Policies;

use App\Models\Permission;
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




    public function view_role(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('view_role', $items);
    }


    public function create_role(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('create_role', $items);
    }


    public function update_role(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('update_role', $items);
    }


    public function delete_role(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('delete_role', $items);
    }

}
