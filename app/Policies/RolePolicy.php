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

    public function ppp(User $user) {
            $rolesAssignedToTheUser = DB::table('role_user')
                ->where('user_id', $user->id)
                ->get('role_id');

            $noOfRolesAssignedToTheUser = $rolesAssignedToTheUser->count();

            for ($i=0; $i < $noOfRolesAssignedToTheUser; $i++) { 
                echo $rolesAssignedToTheUser[$i]->role_id . '=====>';

                $role_id = $rolesAssignedToTheUser[$i]->role_id;

                $permissionsAssociatedToTheRole = DB::table('permission_role')
                    ->where('role_id', $role_id)
                    ->get('permission_id');

                $noOfPermissionsAssociatedToTheRole = $permissionsAssociatedToTheRole->count();
                for ($ii=0; $ii < $noOfPermissionsAssociatedToTheRole; $ii++) { 
                    $permission_id = $permissionsAssociatedToTheRole[$ii]->permission_id;

                    $permissionDetails = DB::table('permissions')
                        ->where('id', $permission_id)
                        ->get();

                        
                    echo $permission_id . '==>' . $permissionDetails . '<br>';
                }
                echo '<br><br>';

            }




            //$noOfPermissionsAssociatedToTheRole = $permissionsAssociatedToTheRole->count();

            $count = 0;

            

            //dd($rolesAssignedToTheUser);

    }


    public function viewOnly(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('view', $items);
    }


    public function createOnly(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('create', $items);
    }


    public function updateOnly(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('update', $items);
    }


    public function deleteOnly(User $user){

        $items = array();
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($items, $permission->slug);
            }
        }

        return in_array('delete', $items);
    }

}
