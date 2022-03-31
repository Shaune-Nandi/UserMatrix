<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use App\Policies\RolePolicy;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_dashboard(){
        return view('dashboard');
    }





    public function show_register(){
        $role = Role::all();
        return view('register', compact('role'));
    }




    public function store_register(){
        $registerDetails = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        $registerDetails['password'] = bcrypt($registerDetails['password']);

        $role = Role::find(request('role'));

        $user = User::create($registerDetails);
        $user->roles()->attach($role);

        auth()->login($user);

        return redirect('/dashboard')->with('success', 'Registration successfull');
    }




    public function show_login(){
        return view('login');
    }


    public function store_login(){
        $loginDetails = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($loginDetails)){
            session()->regenerate();

            return redirect('/dashboard')->with('success', 'welcome back');
        }
        else{
            return redirect('/login');
        }
    }




    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'You have logged out successfully');
    }





    public function show_roles(Role $role){
        // $this->authorize('view', Role::class);

        $role = Role::orderBy('created_at', 'desc')->get();
        return view('roles', ['roles' => $role]);
    }





    public function create_role(Role $role){
        $permission = Permission::all();
        return view('create_role', compact('permission'));
    }





    public function save_created_role(){
        $RoleDetails = request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'checkbox' => 'required'
        ]);

        $permission_id = request('checkbox');

        $permission = Permission::find($permission_id);

        if ($permission) {
            $role = Role::create($RoleDetails);     
            $role->permissions()->attach($permission);            
            return redirect('/roles')->with('success', 'New role created successfully');
        }

        return 5000000;
    }





    public function create_permission() {
        return view('create_permission');
    }





    public function save_created_permission() {
        $PermissionDetails = request()->validate([
            'permission_name' => 'required',
            'slug' => 'required'
        ]);

        $permission = Permission::create($PermissionDetails);

        return redirect('/permissions')->with('success', 'New permission created successfully');
    }





    public function show_permissions(){
        $permission = Permission::all();
        return view('permissions', ['permission' => $permission]);
    } 


    public function update_role(Role $role){
        $permission = Permission::all();
        return view('edit_role', compact('role','permission'));
    }

    public function save_updated_role(Role $role, Request $request){


        request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $role = Role::find(request('id'));

        $role->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        $role->touch();

        return redirect('/roles')->with('success', 'Role updated successfully');

    }





    public function delete_role(){
        //$permission = Permission::find($permission_id);


        $role = Role::find(request('id'));
        $role->delete($role);
        $role->permissions()->detach();            


        return redirect('/roles')->with('success','Role deleted successfully');
    }
    
}
