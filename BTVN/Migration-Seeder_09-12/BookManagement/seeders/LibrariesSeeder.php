<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('libraries')->insert([
            ['name' => 'Thư viện IT Đại học ABC', 'address' => '123 Đường X, Hà Nội', 'contact_number' => '0123456789'],
        ]);
    }
}
