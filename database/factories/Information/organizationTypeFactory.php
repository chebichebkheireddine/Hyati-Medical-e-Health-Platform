<?php

namespace Database\Factories\information;

use App\Models\information\organizationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class organizationTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    // protected $model = organizationType::class;


    public function definition()
    {
        return [
            'type_id' => 1,
            'type_name' => "RIS",
            'type_des' => "RIS",
        ];
    }
}
