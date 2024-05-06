<?php

namespace App\Models\MedicalRecords;

use App\Models\Apimodel\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralMedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'general_medical_records';
    protected $prymaryKey = 'id';
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'healthId');
    }
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'patientId', 'patientId');
    }
    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class, 'patientId', 'patientId');
    }
    public function consultationRecords()
    {
        return $this->hasMany(ConsultationRecord::class, 'patientId', 'patientId');
    }
    public function medications()
    {
        return $this->hasMany(Medication::class, 'patientId', 'patientId');
    }
    public function labrecords()
    {
        return $this->hasMany(LabRecord::class, 'patientId', 'patientId');
    }
    public function radiologyrecords()
    {
        return $this->hasMany(RadiologyRecord::class, 'patientId', 'patientId');
    }
    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class, 'patientId', 'patientId');
    }
    public function currentMedications()
    {
        return $this->hasMany(CurrentMedication::class, 'patientId', 'patientId');
    }
}
