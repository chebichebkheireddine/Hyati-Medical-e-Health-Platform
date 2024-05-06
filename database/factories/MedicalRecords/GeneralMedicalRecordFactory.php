<?php

namespace Database\Factories\MedicalRecords;

use App\Models\MedicalRecords\GeneralMedicalRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneralMedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = GeneralMedicalRecord::class;
    public function definition()
    {
        return [
            //
            'patientId' => 3,
            'medicalHistory' => $this->faker->text(100),
            'familyHistory' => $this->faker->text(100),
            'height' => $this->faker->randomFloat(2, 1, 2),
            'weight' => $this->faker->randomFloat(2, 1, 2),
            'bloodType' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'diastolicBloodPressure' => $this->faker->randomFloat(2, 1, 2),
            'systolicBloodPressure' => $this->faker->randomFloat(2, 1, 2),
            'allergies' => $this->faker->text(100),
            'lastUpdateDate' => $this->faker->dateTime(),
            'vitality' => $this->faker->boolean(),
        ];
    }
}
