<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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


//     public function view(User $user, Role $role)
// {
//     return $user->roles->pluck('id')->contains($role->id);
// }





    public function view_roles(User $user){

        $user->id;

        $varri = User::whereHas('roles', function($query) {
            $query->where('slug', 'admin');
        })->get()->toArray();
        
        //dd($user->id);
        $users = Role::find(37)->users;


        dd($users);

        //dd($user->id);

        //dd($varri);

        //dd(array_search(1, $varri));




        if(in_array($user->id, $varri)){
            return true;
        }else{
            return redirect('/dashboard');
        }
        
        
    }





}
