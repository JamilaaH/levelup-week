<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                "nom"=>"Hmn", 
                'prenom'=>'Jamila',
                'role_id'=>3,
                'email'=>'jamila@gmail.com',
                'password'=> Hash::make('testtest'),
                'created_at'=>now(),
            ],
            [
                "nom"=>"Test", 
                'prenom'=>'charlotte',
                'role_id'=>2,
                'email'=>'charlotte@gmail.com',
                'password'=> Hash::make('testtest'),
                'created_at'=>now(),
            ],
        ]);
    }
}
