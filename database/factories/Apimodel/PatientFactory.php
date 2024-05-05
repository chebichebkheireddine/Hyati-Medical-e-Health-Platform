<?php

namespace Database\Factories\Apimodel;
// you must do this

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "firstName" => $this->faker->firstName(),
            "lastName" => $this->faker->lastName(),
            "birthDate" => $this->faker->date('Y_m_d'),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => Hash::make('1234567890'),
            "gender" => $this->faker->randomElement(['M', 'F']),
            "phone" => $this->faker->phoneNumber(),
            "street" => $this->faker->address(),
            "wilaya" => 3,
            "baldya" => 1,
            "generalMedicalRecord" => 1,
            "card" => 1,
        ];
    }
}
