<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Policies\RolePolicy;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_dashboard(){
        $user = User::all();
        $role = Role::all();
        return view('dashboard', compact('user', 'role'));
    }


//------------------------------------------------------------------------------------------------------------------------
//Users

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
            'password' => 'required|min:5|confirmed'
        ]);

        $registerDetails['password'] = bcrypt($registerDetails['password']);

        $role_id = DB::table('roles')->where('slug','user')->value('id');
        $role = Role::find($role_id);

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


    public function create_new_user() {
        $this->authorize('createOnly', Role::class);
        $role = Role::all(); 
        return view('create_user', ['role' => $role]);
    }


    public function save_created_user() {
        $this->authorize('createOnly', Role::class);
        $userDetails = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required'
        ]);

        $userDetails['password'] = bcrypt($userDetails['password']);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        $user_id = DB::table('users')->where('username', request('username'))->value('id');
        $user = User::find($user_id);

        $selectedRolesid = request('role');

        $count = count($selectedRolesid);

         for ($i=0; $i < $count; $i++) { 
            $role = Role::find($selectedRolesid[$i]);
            $user->roles()->attach($role->id);
        }

        return redirect('/dashboard')->with('success','User created and role assigned successfully');
    }


    public function show_user_roles() {
        $this->authorize('createOnly', Role::class);
        $roles = Role::all();

        $user_id = DB::table('users')->where('id', request('id'))->value('id');
        $user = User::find($user_id);

        return view('edit_user_roles', compact('roles', 'user'));
    }

   
    public function save_user_roles() {
        $this->authorize('createOnly', Role::class);
        $user = User::find(request('user_id'));
        $count = count(request('role'));

        $noOfUserRoles = DB::table('role_user')->where('user_id', $user->id)->count();

        if ($noOfUserRoles > 0) {
            $user->roles()->detach();
        }        

        for ($i=0; $i < $count; $i++) { 
            $role_id = request('role')[$i];
            $role = Role::find($role_id);
            $user->roles()->attach($role_id);
        }

        return redirect('/dashboard')->with('success', 'Roles have been assigned successfully');
    }

    
    public function delete_user(){
        $this->authorize('deleteOnly', Role::class);

        $user = User::find(request('id'));
        $user->delete($user);
        $user->roles()->detach();

        return redirect('/dashboard')->with('success','User deleted successfully');
    }




//------------------------------------------------------------------------------------------------------------------------
//Roles

    public function show_roles(Role $role){

        $role = Role::orderBy('created_at', 'desc')->get();
        return view('roles', ['roles' => $role]);
    }


    public function create_role(Role $role){
        $this->authorize('createOnly', Role::class);
        $permission = Permission::all();
        return view('create_role', compact('permission'));
    }


    public function save_created_role(){
        $this->authorize('createOnly', Role::class);
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


    public function update_role(Role $role){
        $this->authorize('updateOnly', Role::class);

        $permission = Permission::all();
        return view('edit_role', compact('role','permission'));
    }

    public function save_updated_role(Role $role, Request $request){
        $this->authorize('updateOnly', Role::class);

        request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $role = Role::find(request('id'));

        $role->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        $role->touch();

        return redirect('/roles/update/permissions')->with('success', 'Role updated successfully. Now assign permissions to the role');
    }


    public function show_role_permissions() {
        $this->authorize('updateOnly', Role::class);

        $permissions = Permission::all();
        $role = Role::orderBy('updated_at','DESC')->first();

        return view('edit_role_permission', compact('permissions', 'role'));
    }

    
    public function save_role_permissions() {
        $this->authorize('updateOnly', Role::class);

        $rolePermissionDetails = request()->validate([
            'permission' => 'required'
        ]);

        $role = Role::find(request('role_id'));
        $count = count(request('permission'));

        $role->permissions()->detach();

        for ($i=0; $i < $count; $i++) { 
            $permission_id = request('permission')[$i];
            $permission = Permission::find($permission_id);
            $role->permissions()->attach($permission_id);
        }

        return redirect('/roles')->with('success', 'Role is now set');
    }


    public function delete_role(){
        $this->authorize('deleteOnly', Role::class);

        $role = Role::find(request('id'));
        $role->delete($role);
        $role->permissions()->detach();            

        return redirect('/roles')->with('success','Role deleted successfully');
    }
    



//------------------------------------------------------------------------------------------------------------------------
//Permissions

    public function create_permission() {
        $this->authorize('createOnly', Role::class);
        return view('create_permission');
    }


    public function save_created_permission() {
        $this->authorize('createOnly', Role::class);
        $PermissionDetails = request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $permission = Permission::create($PermissionDetails);

        return redirect('/permissions')->with('success', 'New permission created successfully');
    }


    public function show_permissions(){
        $permission = Permission::all();
        return view('permissions', ['permission' => $permission]);
    } 


    public function update_permission(){
        $this->authorize('updateOnly', Role::class);

        $permission = Permission::find(request('id'));
        return view('edit_permission', compact('permission'));
    }


    public function save_updated_permission(){
        $this->authorize('updateOnly', Role::class);

        request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $permission = Permission::find(request('id'));

        $permission->update([
            'name' => request('name'),
            'slug' => request('slug')
        ]);

        $permission->touch();

        return redirect('/permissions')->with('success', 'Permission updated successfully');
    }


    public function delete_permission(){
        $this->authorize('deleteOnly', Role::class);

        $permission = Permission::find(request('id'));
        $permission->delete($permission);
        $permission->roles()->detach();

        return redirect('/permissions')->with('success','Permission deleted successfully');
    }

}
