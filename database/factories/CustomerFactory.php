<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' =>$this->faker->first_name,
            'last_name' =>$this->faker->last_name,
            'first_username' =>$this->faker->first_username,
            'last_username' =>$this->faker->last_username,
            'email' =>$this->faker->email,
            'phone_number' =>$this->faker->phoneNumber,
            'address' =>$this->faker->address,           
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}