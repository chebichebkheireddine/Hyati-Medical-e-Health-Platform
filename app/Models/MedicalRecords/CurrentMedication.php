<?php

namespace App\Models\MedicalRecords;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentMedication extends Model
{
    use HasFactory;
    protected $table = 'currentMedications';
    protected $prymaryKey = 'id';
    public function currentMedicationGeneralMedicalRecords()
    {
        return $this->belongsTo(GeneralMedicalRecord::class, 'patientId', 'id');
    }
    public function currentMedicationConsultationRecords()
    {
        return $this->belongsTo(ConsultationRecord::class, 'patientId', 'id');
    }
    public function currentMedicationDrugs()
    {
        return $this->belongsTo(Drugs::class, 'drugId', 'id');
    }
}
