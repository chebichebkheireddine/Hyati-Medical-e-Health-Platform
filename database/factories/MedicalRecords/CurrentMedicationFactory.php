<?php

namespace Database\Factories\MedicalRecords;

use App\Models\MedicalRecords\CurrentMedication;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrentMedicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = CurrentMedication::class;
    public function definition()
    {
        return [
            //
            'patientId' => 3,
            'drugId' => 1,
            'dosage' => 1.2,
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'frequency' => 1,
            'status' => 1,
        ];
    }
}
