<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'sysId' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'orgID' => 0,
            'nationalID' => $this->faker->numberBetween(1000000000, 9999999999),
            'firstName' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'id_commune' => 1,
            'id_wilaya' => 1,
            // 'role_id' => $this->faker->numberBetween(0, 2),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
