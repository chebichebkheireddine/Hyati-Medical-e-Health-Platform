<?php

namespace Database\Factories\MedicalRecords;

use App\Models\MedicalRecords\FamilyMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = FamilyMember::class;
    public function definition()
    {
        return [
            //
            'memberType' => 1,
            'patientId' => 3,
            'memberHealthId' => $this->faker->numberBetween(1, 10),

        ];
    }
}
