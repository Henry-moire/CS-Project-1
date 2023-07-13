<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // Admin
            [
                'name'=> 'Admin',
                'email'=>'admin@gmail.com',
                'password'=> HASH::make(111),
                'role'=>'admin',
                'status'=>'active',
            ],
            //Organization
            [
                'name'=> 'Jeff Organization',
                'email'=>'organization@gmail.com',
                'password'=> HASH::make(111),
                'role'=>'organization',
                'status'=>'active',
            ],
            //User
            [
                'name'=> 'user',
                'email'=>'user@gmail.com',
                'password'=> HASH::make(111),
                'role'=>'user',
                'status'=>'active',
            ],
        ]);

    }
}
