<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'JohnDoeAdmin',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);




        DB::table('users')->insert([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'JaneDoeUser',
            'email' => 'janedoe@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);
    }
}
