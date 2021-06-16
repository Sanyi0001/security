<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cars')->insert([
            'registration_number' => '12345678', 'manufacturer' => 'Ford', 'currently_available' =>1, 'contact_email' => "example1@gmail.com",'USD'=>5400
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '14368235', 'manufacturer' => 'Tesla', 'currently_available' =>0, 'contact_email' => "example1@gmail.com",'USD'=>2970
        ]);
        \DB::table('cars')->insert([
            'registration_number' => '14238845', 'manufacturer' => 'Audi', 'currently_available' =>1, 'contact_email' => "example2@gmail.com", 'USD'=>12540
        ]);

        //Car::factory()->count(10)->create();
    }


}
