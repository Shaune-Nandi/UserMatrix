<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'View permission',
            'slug' => 'view_permission',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Create permission',
            'slug' => 'create_permission',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Update permission',
            'slug' => 'update_permission',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'Delete permission',
            'slug' => 'delete_permission',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);










        DB::table('permissions')->insert([
            'name' => 'View_Role',
            'slug' => 'view_role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Create_Role',
            'slug' => 'create_role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Update_Role',
            'slug' => 'update_role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'Delete_Role',
            'slug' => 'delete_role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);




        





        DB::table('permissions')->insert([
            'name' => 'View User',
            'slug' => 'view_user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Create User',
            'slug' => 'create_user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Update User',
            'slug' => 'update_user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'Delete User',
            'slug' => 'delete_user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
