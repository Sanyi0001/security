<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Car;
use App\Models\User;
use App\Http\Controllers\CarController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CarValidationsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_car_validation_with_wrong_registration_number()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('cars.store'), [
            'registration_number' => 123456,
            'manufacturer' => 'Audi',
            'contact_email' => "example33@gmail.com",
            'currently_available' => 0,
            'USD' => 1000
        ]);
        $response->assertSessionHasErrors(['registration_number']);

    }

    public function test_create_car_validation_with_badly_formatted_email_address()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('cars.store'), [
            'registration_number' => 12345678,
            'manufacturer' => 'Audi',
            'contact_email' => "example33@",
            'currently_available' => 0,
            'USD' => 1000
        ]);
        $response->assertSessionHasErrors(['contact_email']);
    }
}
