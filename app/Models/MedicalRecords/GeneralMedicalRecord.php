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
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'patientId', 'id');
    }
    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class, 'patientId', 'id');
    }
    public function consultationRecords()
    {
        return $this->hasMany(ConsultationRecord::class, 'patientId', 'id');
    }
    public function medications()
    {
        return $this->hasMany(Medication::class, 'patientId', 'id');
    }
    public function labrecords()
    {
        return $this->hasMany(LabRecord::class, 'patientId', 'id');
    }
    public function radiologyrecords()
    {
        return $this->hasMany(RadiologyRecord::class, 'patientId', 'id');
    }
    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class, 'patientId', 'id');
    }
    public function currentMedications()
    {
        return $this->hasMany(CurrentMedication::class, 'patientId', 'id');
    }
}