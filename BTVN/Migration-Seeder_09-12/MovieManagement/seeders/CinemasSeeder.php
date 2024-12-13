<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cinemas')->insert([
            ['name' => 'CGV Vincom', 'location' => 'Vincom Center, Hà Nội', 'total_seats' => 300],
        ]);
    }
    
}
