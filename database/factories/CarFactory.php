<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "registration_number" => $this->faker->numerify('########'),
            "manufacturer" => $this->faker->company(),
            "contact_email" => $this->faker->unique()->safeEmail(),
            "currently_available" => $this->faker->boolean(),
            "USD" => $this->faker->numerify('####'),
        ];
    }
}
