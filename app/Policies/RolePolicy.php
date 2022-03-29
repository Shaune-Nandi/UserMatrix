<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

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


    public function edit_role(Role $role, Permission $permission){
        
    }





}
