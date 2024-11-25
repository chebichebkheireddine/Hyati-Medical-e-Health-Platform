<?php

namespace Database\Factories\MedicalRecords;

use App\Models\MedicalRecords\EmergencyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmergencyContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = EmergencyContact::class;
    public function definition()
    {
        return [
            //
            'patientId' => 3,
            'name' => $this->faker->name(),
            'phoneNumber' => $this->faker->phoneNumber(),
        ];
    }
}
