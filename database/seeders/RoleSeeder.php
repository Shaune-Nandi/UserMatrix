<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'slug' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 1,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 3,
            'role_id' => 1,
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 4,
            'role_id' => 1,
        ]);








        DB::table('roles')->insert([
            'name' => 'Normal user',
            'slug' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 2,
        ]);

    }
}
