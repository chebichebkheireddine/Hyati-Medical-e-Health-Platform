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
    public $timestamps = false;
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
    public function family()
    {
        return $this->belongsTo(family::class, 'memberType', 'id');
    }
    public function memberHealth()
    {
        return $this->belongsTo(Patient::class, 'memberHealthId', 'id');
    }
}
