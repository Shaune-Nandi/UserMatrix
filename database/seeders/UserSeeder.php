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
        //  superuser (1)
        DB::table('users')->insert([
            'first_name' => 'Shaune',
            'last_name' => 'Nandi',
            'username' => '110898',
            'email' => 'shaunenandi27@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);




        //  Admin(2)
        DB::table('users')->insert([
            'first_name' => 'LeBron',
            'last_name' => 'James',
            'username' => 'LBJ',
            'email' => 'lebron@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);


        DB::table('users')->insert([
            'first_name' => 'Steph',
            'last_name' => 'Curry',
            'username' => 'Curry30',
            'email' => 'curry@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 2,
        ]);





        //  Manager (2)
        DB::table('users')->insert([
            'first_name' => 'Max',
            'last_name' => 'Verstappen',
            'username' => 'Maxi',
            'email' => 'maxverstappen@yahoo.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_id' => 3,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Lewis',
            'last_name' => 'Hamilton',
            'username' => 'LewisH',
            'email' => 'lewishamilton@yahoo.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 5,
            'role_id' => 3,
        ]);




        //  HR (1)
        DB::table('users')->insert([
            'first_name' => 'Harri',
            'last_name' => 'Masi',
            'username' => 'Harri',
            'email' => 'harri@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 6,
            'role_id' => 4,
        ]);





        //  Employees (5)
        DB::table('users')->insert([
            'first_name' => 'Christiano',
            'last_name' => 'Ronaldo',
            'username' => 'CR7',
            'email' => 'ronaldo7@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 7,
            'role_id' => 5,
        ]);


        DB::table('users')->insert([
            'first_name' => 'Paul',
            'last_name' => 'Pogba',
            'username' => 'PPP',
            'email' => 'pogba@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 8,
            'role_id' => 5,
        ]);

        
        DB::table('users')->insert([
            'first_name' => 'Mo',
            'last_name' => 'Salah',
            'username' => 'MoSalah',
            'email' => 'mosalah@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 9,
            'role_id' => 5,
        ]);

        
        DB::table('users')->insert([
            'first_name' => 'Sadio',
            'last_name' => 'Mane',
            'username' => 'SMane',
            'email' => 'sadiomane@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 10,
            'role_id' => 5,
        ]);

        
        DB::table('users')->insert([
            'first_name' => 'Romelu',
            'last_name' => 'Lukaku',
            'username' => 'r9',
            'email' => 'romelu@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 11,
            'role_id' => 5,
        ]);





    }
}
