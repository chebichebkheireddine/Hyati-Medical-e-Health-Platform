<?php

namespace App\Models\MedicalRecords;

use App\Models\Apimodel\Patient;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationRecord extends Model
{
    use HasFactory;
    protected $table = 'consultationRecords';
    protected $prymaryKey = 'id';
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
    public function generalMedicalRecords()
    {
        return $this->belongsTo(GeneralMedicalRecord::class, 'generalMedicalRecordId', 'id');
    }
    public function healthcare()
    {
        return $this->belongsTo(Doctor::class, 'professionalId', 'id');
    }
}
