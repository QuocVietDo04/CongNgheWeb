<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('issues')->insert([
            'computer_id' => 1, // Giả sử máy tính có id = 1
            'reported_by' => 'Admin',
            'reported_date' => now(),
            'description' => 'Máy tính không khởi động.',
            'urgency' => 'High',
            'status' => 'Open',
        ]);
    }
    
}
