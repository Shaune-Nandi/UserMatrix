<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_dashboard(){
        return view('dashboard');
    }


    public function show_register(){
        return view('register');
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

        $user = User::create($registerDetails);

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


    public function show_roles(){
        $role = Role::orderBy('created_at', 'desc')->get();
        return view('roles', ['roles' => $role]);
    }

    public function create_role(){
        return view('create_role');
    }

    public function save_created_role(){
        $RoleDetails = request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $role = Role::create($RoleDetails);

        //$permission = Permission::find(1);

        //$role2 = Role::find($role->id);
        //$role2->permissions()->attach($permission);


        return redirect('/roles')->with('success', 'New role created successfully');
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
        return 9000000;
        //return view('permissions', ['permission' => $permission]);
    } 
    
}
