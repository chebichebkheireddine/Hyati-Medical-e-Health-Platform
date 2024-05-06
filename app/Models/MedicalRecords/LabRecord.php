<?php

namespace App\Models\MedicalRecords;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabRecord extends Model
{
    use HasFactory;
    protected $table = 'labrecords';
    protected $prymaryKey = 'id';
    public function labGeneralMedicalRecords()
    {
        return $this->belongsTo(GeneralMedicalRecord::class, 'patientId', 'id');
    }
    public function labConsultationRecords()
    {
        return $this->belongsTo(ConsultationRecord::class, 'patientId', 'id');
    }
    public function profficional()
    {
        return $this->belongsTo(Doctor::class, 'professionalId', 'id');
    }
}
