<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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


    
    public function view_user(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('view_user', $items);
    }


    public function create_user(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('create_user', $items);
    }


    public function update_user(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('update_user', $items);
    }


    public function delete_user(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('delete_user', $items);
    }

}
