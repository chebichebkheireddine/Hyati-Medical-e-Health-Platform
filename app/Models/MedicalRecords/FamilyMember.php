<?php

namespace App\Models\MedicalRecords;

use App\Models\Apimodel\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;
    protected $table = 'familyMembers';
    protected $prymaryKey = 'id';
    public function famly()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
    public function memberHealth()
    {
        return $this->belongsTo(Patient::class, 'memberHealthId', 'id');
    }
}
