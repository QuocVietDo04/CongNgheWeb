<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('computers')->insert([
            'computer_name' => 'PC001',
            'model' => 'Dell XPS 13',
            'operating_system' => 'Windows 10',
            'processor' => 'Intel i7',
            'memory' => 8,
            'available' => true,
        ]);
    }
    
}
