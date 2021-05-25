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
            'registration_number' => '12345678', 'manufacturer' => 'Ford', 'currently_available' =>1, 'contact_email' => "example1@gmail.com"
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '14368235', 'manufacturer' => 'Tesla', 'currently_available' =>0, 'contact_email' => "example1@gmail.com"
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '14238845', 'manufacturer' => 'Audi', 'currently_available' =>1, 'contact_email' => "example2@gmail.com"
        ]);
    }
}
