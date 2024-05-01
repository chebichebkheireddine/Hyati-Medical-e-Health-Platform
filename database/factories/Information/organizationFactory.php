<?php

namespace Database\Factories\information;

use App\Models\information\organisationtype;
use Illuminate\Database\Eloquent\Factories\Factory;

class organizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    // protected $model = organisationtype::class;

    public function definition()
    {
        return [
            //
            'org_name' => $this->faker->name,
            'org_email' => $this->faker->unique()->safeEmail,
            'org_phone' => $this->faker->phoneNumber,
            'org_address' => $this->faker->address,
            'org_wilaya' => 1,
            'org_baldya' => 1,
            'org_type' => 1,
        ];
    }
}