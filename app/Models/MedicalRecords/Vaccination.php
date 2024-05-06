<?php

namespace App\Models\MedicalRecords;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    protected $table = 'vaccinations';
    protected $prymaryKey = 'id';
    public function vaccinationGeneralMedicalRecords()
    {
        return $this->belongsTo(GeneralMedicalRecord::class, 'patientId', 'id');
    }
    public function vaccinationConsultationRecords()
    {
        return $this->belongsTo(ConsultationRecord::class, 'patientId', 'id');
    }
    public function vaccinationDrugs()
    {
        return $this->belongsTo(Drugs::class, 'drugId', 'id');
    }
    public function proffesionals()
    {
        return $this->belongsTo(Doctor::class, 'professionalId', 'id');
    }
}
