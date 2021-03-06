<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ElevatedPrivilegesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cars_access_without_admin_privileges()
    {
        // Unhappy path

        // Given (Arrange, the user is logged in as normal user)
        $user = User::factory()->create();
        $car = Car::factory()->create();
        // When (Acr, the user and tries to reach the edit panel)
        $response = $this->actingAs($user)->get('/cars/1/edit');

        // Then (Assert, the user is prompted with a 403 page)
        $response->assertStatus(403);
    }

    public function test_cars_edit_with_admin_privileges()
    {
        // Happy path

        // Given (Arrange, the user is logged in as admin)
        $admin = User::factory()->create();
        $car = Car::factory()->create();

        //This is the default email address, the
        //system determines the role based on the email address. The admin email is hardcoded and seeded to the DB
        $admin->email = "admin@admin.com";

        // When (Act, the admin clicks on the „cars” tab and accesses the edit form)
        $response = $this->actingAs($admin)->get('/cars/1/edit');

        // Then (Assert ,the admin is able to see the details of the cars)
        $response->assertStatus(200);
    }

    public function test_cars_delete_with_admin_privileges()
    {
        // Happy path

        // Given (Arrange, the user is logged in as admin)
        $admin = User::factory()->create();
        //This is the default email address, the
        //system determines the role based on the email address. The admin email is hardcoded and seeded to the DB
        $admin->email = "admin@admin.com";
        $car = Car::factory()->create();
        $manufacturer = $car->manufacturer;
        $route = route('cars.destroy', $car);

        // When (Act, the admin clicks the delete button)
        $response = $this->actingAs($admin)->delete($route);

        // Then (Assert ,the car is no longer in the database)
        $response->assertStatus(302);
        $this->assertDatabaseMissing('cars', ["manufacturer" => $manufacturer]);
    }
}
