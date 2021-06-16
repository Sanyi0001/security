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
    public function test_cars_delete_without_admin_privileges()
    {
        // Given (Arrange, the guest is not logged in and clicks on the „cars” tab in the navbar)
        $response = $this->get('/cars');

        // When (Act, the user is not logged in) , Then (Assert, the user is redirected to the login page)
        $response->assertStatus(302);
    }

    public function test_cars_edit_with_admin_privileges()
    {
        // Given (Arrange, the user is logged in as admin)
        $admin = User::factory()->create();
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
        // Given (Arrange, the user is logged in as admin)
        $admin = User::factory()->create();
        //This is the default email address, the
        //system determines the role based on the email address. The admin email is hardcoded and seeded to the DB
        $admin->email = "admin@admin.com";
        $car = Car::factory()->create();
        $manufacturer = $car->manufacturer;
        $route = route('cars.destroy', $car);

        // When (Act, the deletes a car)
        $response = $this->actingAs($admin)->delete($route);

        // Then (Assert ,the user is able to see the details of the cars)
        $response->assertStatus(302);
        $this->assertDatabaseMissing('cars', ["manufacturer" => $manufacturer]);
    }
}
