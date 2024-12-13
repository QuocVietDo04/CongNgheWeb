<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('movies')->insert([
            ['title' => 'Avengers: Endgame', 'director' => 'Anthony và Joe Russo', 'release_date' => '2019-04-26', 'duration' => 181, 'cinema_id' => 1],
        ]);
    }
    
}
