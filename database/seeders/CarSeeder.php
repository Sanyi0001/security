<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cars')->insert([
            'registration_number' => '123456789', 'manufacturer' => 'Ford', 'currently_available' =>1
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '143682350', 'manufacturer' => 'Tesla', 'currently_available' =>0
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '142388457', 'manufacturer' => 'Audi', 'currently_available' =>1
        ]);
    }
}
