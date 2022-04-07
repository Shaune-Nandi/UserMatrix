<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use Carbon\Carbon;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionCount = Permission::count();

        //  Superuser Role
        DB::table('roles')->insert([
            'name' => 'SuperUser',
            'slug' => 'super',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        for ($i=1; $i <= $permissionCount; $i++) { 
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 1,
            ]);
        }




        // Administrator Role
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'slug' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 2,
        ]);

        for ($i=5; $i <= $permissionCount; $i++) { 
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 2,
            ]);
        }




        //  Manager Role
        DB::table('roles')->insert([
            'name' => 'Manager',
            'slug' => 'manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 5,
            'role_id' => 3,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 9,
            'role_id' => 3,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 11,
            'role_id' => 3,
        ]);




        //  HR Role
        DB::table('roles')->insert([
            'name' => 'Human resource',
            'slug' => 'hr',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 5,
            'role_id' => 4,
        ]);

        for ($i=9; $i <= $permissionCount; $i++) { 
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 4,
            ]);
        }




        //  Employee Role (Normal user)
        DB::table('roles')->insert([
            'name' => 'Employee',
            'slug' => 'employee',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 5,
            'role_id' => 5,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 9,
            'role_id' => 5,
        ]);

    }
}
