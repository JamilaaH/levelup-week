<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'user_id'=>1,
                "nom"=>"web",
                'created_at'=>now(),
            ],
            [
                'user_id'=>1,
                "nom"=>"design",
                'created_at'=>now(),
            ],
            [
                'user_id'=>1,
                "nom"=>"photo",
                'created_at'=>now(),
            ],
        ]);
    }
}
