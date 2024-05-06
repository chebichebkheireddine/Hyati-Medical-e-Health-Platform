<?php

namespace App\Models\MedicalRecords;

use App\Models\Apimodel\Patient;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $table = 'medications';
    protected $prymaryKey = 'id';
    public function professionals()
    {
        return $this->belongsTo(Doctor::class, 'professionalId', 'id');
    }
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
    public function pahrmacy()
    {
        return $this->belongsTo(Doctor::class, 'phareId', 'id');
    }
    public function consultationRecords()
    {
        return $this->hasMany(ConsultationRecord::class, 'patientId', 'id');
    }
    public function generalMedicalRecords()
    {
        return $this->hasMany(GeneralMedicalRecord::class, 'patientId', 'id');
    }
    public function Drugs()
    {
        return $this->hasMany(Drugs::class, 'drugId', 'id');
    }
}
