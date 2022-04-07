<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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



    
    public function view_permission(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('view_permission', $items);
    }


    public function create_permission(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('create_permission', $items);
    }


    public function update_permission(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('update_permission', $items);
    }


    public function delete_permission(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('delete_permission', $items);
    }





}
