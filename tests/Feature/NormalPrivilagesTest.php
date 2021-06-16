<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class normalPrivilagesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cars_without_logging_in()
    {
        //Unhappy path

        // Given (Arrange, the guest is not logged in)

        // When (Act, the guest clicks on the „cars” tab in the navbar)
        $response = $this->get('/cars');

         //Then (Assert, the guest is redirected to the login page)
        $response->assertStatus(302);
    }
    public function test_cars_with_logging_in()
    {
        //Happy path

        // Given (Arrange, the user is logged in)
        $user = User::factory()->create();

        // When (Act, the user clicks on the „cars” tab in the navbar)
        $response = $this->actingAs($user)->get('/cars');

        // Then (Assert ,the user is able to see the details of the cars)
        $response->assertStatus(200);
    }
}
