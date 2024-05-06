<?php

namespace App\Models\MedicalRecords;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyRecord extends Model
{
    use HasFactory;
    protected $table = 'radiologyrecords';
    protected $prymaryKey = 'id';
    public function radiologyGeneralMedicalRecords()
    {
        return $this->belongsTo(GeneralMedicalRecord::class, 'patientId', 'id');
    }
    public function radiologyConsultationRecords()
    {
        return $this->belongsTo(ConsultationRecord::class, 'patientId', 'id');
    }
    public function profficional()
    {
        return $this->belongsTo(Doctor::class, 'professionalId', 'id');
    }
}
