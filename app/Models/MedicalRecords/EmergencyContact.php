<?php

namespace App\Models\MedicalRecords;

use App\Models\Apimodel\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;
    protected $table = 'emergencyContacts';
    protected $prymaryKey = 'id';
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
}
