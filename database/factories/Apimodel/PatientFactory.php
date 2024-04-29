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
            "firstname" => $this->faker->firstName(),
            "lastname" => $this->faker->lastName(),
            "email" => "kheireddine.chebicheb@univ-tiaret.dz",
            "password" => Hash::make('1234567890'),
            "phone" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "id_commune" => $this->faker->numberBetween(1, 48),
            "id_wilaya" => $this->faker->numberBetween(1, 48),
        ];
    }
}
