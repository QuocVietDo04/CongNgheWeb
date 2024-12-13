<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('laptops')->insert([
            ['brand' => 'Dell', 'model' => 'Inspiron 15 3000', 'specifications' => 'i5, 8GB RAM, 256GB SSD', 'rental_status' => false, 'renter_id' => 1],
        ]);
    }
    
}
