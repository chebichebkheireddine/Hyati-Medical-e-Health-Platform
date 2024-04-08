<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecializationFactory extends Factory
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
            // "specialization_name" => $this->faker()->unique()->name(),
            // "specialization_description" => $this->faker()->sentence(),
        ];
    }
}
